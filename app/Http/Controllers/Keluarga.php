<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Desa as DesaModel;
use App\Models\JenisPangan as JenisPanganModel;
use App\Models\Keluarga as KeluargaModel;
use App\Models\Pangan as PanganModel;
use App\Models\PanganKeluarga as PanganKeluargaModel;
use App\Models\RentangUang as RentangUangModel;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class Keluarga extends Controller
{
    /**
     * Views
     */
    public function index($id = null): View|RedirectResponse
    {
        try {
            $kader = Auth::user()->kader->id_kader;
            $data = KeluargaModel::where('id_kader', $kader)
                ->get()
                ->map(function ($item) {
                    return (object) [
                        'id' => $item->id_keluarga,
                        'nama' => $item->nama_kepala_keluarga,
                        'desa' => $item->desa->nama_desa,
                    ];
                });

            return view('pages.surveyor.keluarga', ['data' => $data, 'keluarga' => $id ? KeluargaModel::with('desa')->findOrFail($id) : null]);
        } catch (Exception $exception) {
            Log::error('Terjadi kesalahan saat mengambil data: ' . $exception->getMessage());
            return back()->withErrors(['errors' => 'Data tidak ditemukan!']);
        }
    }

    public function show(): View
    {
        $kader = User::find(Auth::user()->id_user)->kader;
        $desa = DesaModel::where('id_kecamatan', $kader->kecamatan->id_kecamatan)->pluck('nama_desa', 'id_desa')->toArray();
        $jenis_pangan = JenisPanganModel::all()->pluck('nama_jenis', 'id_jenis_pangan')->toArray();
        $nama_pangan = PanganModel::all()->groupBy('id_jenis_pangan')->map(fn($items) => $items->pluck('nama_pangan', 'id_pangan')->toArray())->toArray();
        $batas_bawah = RentangUangModel::all()->pluck('batas_bawah', 'id_rentang_uang')->toArray();
        $batas_atas = RentangUangModel::all()->pluck('batas_atas', 'id_rentang_uang')->toArray();
        $takaran = PanganModel::all()->pluck('takaran', 'id_pangan')->toArray();

        $rentang_uang = [];
        foreach ($batas_bawah as $id => $bawah) {
            $atas = $batas_atas[$id] ?? null;
            $rentang_uang[$id] = "$bawah - $atas";
        }

        return view('pages.surveyor.tambah-data-keluarga', [
            'desa' => $desa,
            'jenis_pangan' => $jenis_pangan,
            'nama_pangan' => $nama_pangan,
            'rentang_uang' => $rentang_uang,
            'takaran' => $takaran,
        ]);
    }


    /**
     * Controllers
     */
    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'nama_kepala_keluarga' => 'string|required|max:255',
                'id_desa' => 'string|required|max:255',
                'alamat' => 'string|required|max:255',
                'jumlah_keluarga' => 'integer|required|min:1|max:50',
                'range_pendapatan' => 'string|required|max:255',
                'range_pengeluaran' => 'string|required|max:255',
                'is_hamil' => 'in:Ya,Tidak|required',
                'is_menyusui' => 'in:Ya,Tidak|required',
                'is_balita' => 'in:Ya,Tidak|required',
                'detail_pangan_keluarga' => 'array',
            ]);

            $data = $request->all();
            if ($request->hasFile('gambar')) $data['gambar'] = base64_encode(file_get_contents($request->file('gambar')));

            $user = Auth::user();
            $data['id_kader'] = $user->kader->id_kader;
            $data['id_kecamatan'] = $user->kader->id_kecamatan;

            $keluarga = new KeluargaModel();
            $keluarga->nama_kepala_keluarga = $data['nama_kepala_keluarga'];
            $keluarga->id_desa = $data['id_desa'];
            $keluarga->id_kader = $data['id_kader'];
            $keluarga->id_kecamatan = $data['id_kecamatan'];
            $keluarga->alamat = $data['alamat'];
            $keluarga->jumlah_keluarga = $data['jumlah_keluarga'];
            $keluarga->rentang_pendapatan = $data['range_pendapatan'];
            $keluarga->rentang_pengeluaran = $data['range_pengeluaran'];
            $keluarga->is_hamil = $data['is_hamil'];
            $keluarga->is_menyusui = $data['is_menyusui'];
            $keluarga->is_balita = $data['is_balita'];
            if (isset($data['gambar'])) $keluarga->gambar = $data['gambar'];
            $keluarga->save();

            if (!empty($data['detail_pangan_keluarga'])) {
                foreach ($data['detail_pangan_keluarga'] as $pangan) {
                    PanganKeluargaModel::create([
                        'id_keluarga' => $keluarga->id_keluarga,
                        'id_pangan' => $pangan['nama_pangan'],
                        'urt' => $pangan['jumlah_urt']
                    ]);
                }
            }

            DB::commit();
            return response()->json(['redirect' => route('keluarga')]);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error saat menyimpan data keluarga: ' . $e->getMessage());
            return response()->json(['errors' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()], 500);
        }
    }

    public function detail($id): RedirectResponse|View
    {
        try {
            $keluarga = KeluargaModel::with('desa')->find($id);
            $rentang_uang = RentangUangModel::all()->keyBy('id_rentang_uang');
            $pendapatan = $rentang_uang[$keluarga->rentang_pendapatan]->batas_bawah . ' - ' . $rentang_uang[$keluarga->rentang_pendapatan]->batas_atas;
            $pengeluaran = $rentang_uang[$keluarga->rentang_pengeluaran]->batas_bawah . ' - ' . $rentang_uang[$keluarga->rentang_pengeluaran]->batas_atas;
            $pangan_keluarga = PanganKeluargaModel::where('id_keluarga', $id)->get();
            $pangan_id = $pangan_keluarga->pluck('id_pangan');
            $pangan = PanganModel::whereIn('id_pangan', $pangan_id)->get()->keyBy('id_pangan');
            $jenis_pangan = JenisPanganModel::whereIn('id_jenis_pangan', $pangan->pluck('id_jenis_pangan'))->get()->keyBy('id_jenis_pangan');

            $pangan_detail = $pangan_keluarga->map(function ($item) use ($pangan, $jenis_pangan) {
                $pangan_item = $pangan->get($item->id_pangan);
                return (object) [
                    'nama_pangan' => $pangan_item->nama_pangan,
                    'jenis_pangan' => $jenis_pangan->get($pangan_item->id_jenis_pangan)->nama_jenis,
                    'urt' => $item->urt,
                    'takaran' => $pangan_item->takaran, // Fetch takaran from pangan table
                ];
            });

            return view('pages.surveyor.detail', [
                'keluarga' => $keluarga,
                'pangan_detail' => $pangan_detail,
                'pendapatan' => $pendapatan,
                'pengeluaran' => $pengeluaran,
            ]);
        } catch (Exception $exception) {
            Log::error('Terjadi kesalahan saat mengambil data: ' . $exception->getMessage());
            return redirect()->route('keluarga')->withErrors(['errors' => 'Data tidak ditemukan!']);
        }
    }

    public function edit($id): RedirectResponse|View
    {
        try {
            $keluarga = KeluargaModel::with('desa')->find($id);
            $kader = User::find(Auth::user()->id_user)->kader;
            $desa = DesaModel::where('id_kecamatan', $kader->kecamatan->id_kecamatan)->pluck('nama_desa', 'id_desa')->toArray();
            $jenis_pangan = JenisPanganModel::all()->pluck('nama_jenis', 'id_jenis_pangan')->toArray();
            $nama_pangan = PanganModel::all()->groupBy('id_jenis_pangan')->map(fn($items) => $items->pluck('nama_pangan', 'id_pangan')->toArray())->toArray();
            $batas_bawah = RentangUangModel::all()->pluck('batas_bawah', 'id_rentang_uang')->toArray();
            $batas_atas = RentangUangModel::all()->pluck('batas_atas', 'id_rentang_uang')->toArray();
            $takaran = PanganModel::all()->pluck('takaran', 'id_pangan')->toArray();

            $rentang_uang = [];
            foreach ($batas_bawah as $id => $bawah) {
                $atas = $batas_atas[$id] ?? null;
                $rentang_uang[$id] = "$bawah - $atas";
            }

            return view('pages.surveyor.edit', [
                'desa' => $desa,
                'jenis_pangan' => $jenis_pangan,
                'keluarga' => $keluarga,
                'nama_pangan' => $nama_pangan,
                'rentang_uang' => $rentang_uang,
                'takaran' => $takaran,
            ]);
        } catch (Exception $exception) {
            Log::error('Terjadi kesalahan saat mengambil data: ' . $exception->getMessage());
            return redirect()->route('keluarga')->withErrors(['errors' => 'Data tidak ditemukan!']);
        }
    }

    public function update(Request $request, $id): RedirectResponse
    {
        try {
            KeluargaModel::findOrFail($id)->update($request->validate([
                'nama_kepala_keluarga' => 'required|string|max:255',
                'id_desa' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
                'jumlah_keluarga' => 'required|integer|min:1|max:50',
                'range_pendapatan' => 'required|string|max:255',
                'range_pengeluaran' => 'required|string|max:255',
                'is_hamil' => 'required|in:1,0',
                'is_menyusui' => 'required|in:1,0',
                'is_balita' => 'required|in:1,0',
            ]));

            return redirect()->route('keluarga')->with('success', 'Data keluarga hasil diperbarui!');
        } catch (Exception $exception) {
            Log::error('Terjadi kesalahan saat mengedit data: ' . $exception->getMessage());
            return back()->withErrors(['errors' => 'Gagal memperbarui data!']);
        }
    }

    public function delete($id): RedirectResponse
    {
        try {
            PanganKeluargaModel::where('id_keluarga', $id)->delete();
            KeluargaModel::where('id_keluarga', $id)->firstOrFail()->delete();
            return redirect()->route('keluarga')->with('success', 'Data keluarga berhasil dihapus!');
        } catch (ModelNotFoundException $exception) {
            return back()->withErrors(['errors' => 'Data tidak ditemukan!']);
        } catch (Exception $exception) {
            Log::error('Terjadi kesalahan saat menghapus data: ' . $exception->getMessage());
            return back()->withErrors(['errors' => 'Gagal menghapus data!']);
        }
    }
}
