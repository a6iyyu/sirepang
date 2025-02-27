<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Desa as DesaModel;
use App\Models\DetailPanganKeluarga;
use App\Models\JenisPangan as JenisPanganModel;
use App\Models\Keluarga as KeluargaModel;
use App\Models\Pangan as PanganModel;
use App\Models\PanganKeluarga;
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
    public function index(): View 
    {
        $kader = Auth::user()->kader->id_kader;

        $data = KeluargaModel::where('id_kader', $kader)
        ->get()
        ->map(function($item) {
            return (object) [
                'id' => $item->id_keluarga,
                'nama'=> $item->nama_kepala_keluarga,
                'desa' => $item->desa->nama_desa,
            ];
        });

        return view('pages.surveyor.keluarga', ['data' => $data]);
    }

    public function show(): View
    {
        $kader = User::find(Auth::user()->id_user)->kader;
        $desa = DesaModel::where('id_kecamatan', $kader->kecamatan->id_kecamatan)
            ->pluck('nama_desa', 'id_desa')
            ->toArray();

        $jenis_pangan = JenisPanganModel::all()->pluck('nama_jenis', 'id_jenis_pangan')->toArray();
        $nama_pangan = PanganModel::all()->groupBy('id_jenis_pangan')->map(function ($items) {
            return $items->pluck('nama_pangan', 'id_pangan')->toArray();
        })->toArray();

        $batas_bawah = RentangUangModel::all()->pluck('batas_bawah', 'id_rentang_uang')->toArray();
        $batas_atas = RentangUangModel::all()->pluck('batas_atas', 'id_rentang_uang')->toArray();

        $rentang_uang = [];
        foreach ($batas_bawah as $id => $bawah) {
            $atas = $batas_atas[$id] ?? null;
            $rentang_uang[$id] = "$bawah - $atas";
        }

        $takaran = PanganModel::all()->pluck('takaran', 'id_pangan')->toArray();

        return view('pages.surveyor.tambah-data-keluarga', [
            'rentang_uang' => $rentang_uang,
            'desa' => $desa,
            'jenis_pangan' => $jenis_pangan,
            'nama_pangan' => $nama_pangan,
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
                'is_hamil' => 'in:1,0|required',
                'is_menyusui' => 'in:1,0|required',
                'is_balita' => 'in:1,0|required',
                'detail_pangan_keluarga' => 'array',
            ]);

            $data = $request->all();
            if ($request->hasFile('gambar')) {
                $data['gambar'] = base64_encode(file_get_contents($request->file('gambar')));
            }

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
            if (isset($data['gambar'])) {
                $keluarga->gambar = $data['gambar'];
            }
            $keluarga->save();

            if (!empty($data['detail_pangan_keluarga'])) {
                foreach ($data['detail_pangan_keluarga'] as $pangan) {
                    PanganKeluarga::create([
                        'id_pangan' => $pangan['nama_pangan'],
                        'id_keluarga' => $keluarga->id_keluarga,
                        'urt' => $pangan['jumlah_urt']
                    ]);
                }
            }

            DB::commit();
            return response()->json([
                'redirect' => route('keluarga')
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error saat menyimpan data keluarga: ' . $e->getMessage());
            
            return response()->json([
                'error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function detail($id): RedirectResponse|View
    {
        try {
            $keluarga = KeluargaModel::with('desa')->findOrFail($id);
            return view('pages.surveyor.detail', ['keluarga' => $keluarga]);
        } catch (Exception $exception) {
            Log::error('Terjadi kesalahan saat mengambil data: ' . $exception->getMessage());
            return back()->withErrors(['errors' => 'Data tidak ditemukan!']);
        }
    }

    public function edit($id): RedirectResponse|View
    {
        try {
            return view('pages.surveyor.edit', ['keluarga' => KeluargaModel::findOrFail($id)]);
        } catch (Exception $exception) {
            Log::error('Terjadi kesalahan saat mengambil data: ' . $exception->getMessage());
            return redirect()->route('keluarga')->withErrors(['errors' => 'Data tidak ditemukan!']);
        }
    }

    public function update(Request $request, $id): RedirectResponse
    {
        try {
            $keluarga = KeluargaModel::findOrFail($id);
            $keluarga->update($request->validate([
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
            $keluarga = KeluargaModel::where('id_keluarga', $id)->firstOrFail();
            $keluarga->delete();
            return redirect()->route('keluarga')->with('success', 'Data keluarga berhasil dihapus!');
        } catch (ModelNotFoundException $exception) {
            return back()->withErrors(['errors' => 'Data tidak ditemukan!']);
        } catch (Exception $exception) {
            Log::error('Terjadi kesalahan saat menghapus data: ' . $exception->getMessage());
            return back()->withErrors(['errors' => 'Gagal menghapus data!']);
        }
    }
}