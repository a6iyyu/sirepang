<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Desa as DesaModel;
use App\Models\Keluarga as KeluargaModel;
use App\Models\Pangan as PanganModel;
use App\Models\PanganKeluarga as PanganKeluargaModel;
use App\Models\RentangUang as RentangUangModel;
use App\Models\Takaran as TakaranModel;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class Keluarga extends Controller
{
    public function index($id = null): RedirectResponse|View
    {
        try {
            $kader = Auth::user()->kader->id_kader;
            $data = KeluargaModel::where('id_kader', $kader)->paginate(request()->input('per_page', default: 10));
            $data->through(fn($item) => (object) [
                'id'        => $item->id_keluarga,
                'nama'      => $item->nama_kepala_keluarga,
                'desa'      => $item->desa->nama_desa . ' - ' . $item->desa->kode_wilayah,
                'status'    => $item->status,
                'kecamatan' => $item->kecamatan,
                'komentar'  => $item->komentar,
            ]);

            return view('pages.surveyor.keluarga', [
                'data'      => $data,
                'keluarga'  => isset($id) ? KeluargaModel::with('desa')->findOrFail($id) : null,
            ]);
        } catch (Exception $exception) {
            return back()->withErrors(['errors' => 'Data tidak ditemukan!']);
        }
    }

    public function show(): View
    {
        $kader = User::find(Auth::user()->id_user)->kader;
        $desa = DesaModel::where('id_kecamatan', $kader->kecamatan->id_kecamatan)->get()->mapWithKeys(fn($item) => [$item->id_desa => "$item->nama_desa - $item->kode_wilayah"])->toArray();
        $batas_bawah = RentangUangModel::pluck('batas_bawah', 'id_rentang_uang')->toArray();
        $batas_atas = RentangUangModel::pluck('batas_atas', 'id_rentang_uang')->toArray();
        $takaran = TakaranModel::pluck('nama_takaran', 'id_takaran');
        $nama_pangan = $this->nama_pangan();

        $rentang_uang = [];
        foreach ($batas_bawah as $id => $bawah) {
            $atas = $batas_atas[$id] ?? null;
            $rentang_uang[$id] = match (true) {
                $id == 1 => "< $atas",
                $id == 15 => "> $atas",
                default => "$bawah - $atas"
            };
        }

        return view('pages.surveyor.tambah-data-keluarga', [
            'desa'          => $desa,
            'nama_pangan'   => $nama_pangan,
            'rentang_uang'  => $rentang_uang,
            'takaran'       => $takaran,
        ]);
    }

    public function create(Request $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'nama_kepala_keluarga'      => 'string|required|max:255',
                'id_desa'                   => 'string|required|max:255',
                'alamat'                    => 'string|required|max:255',
                'jumlah_keluarga'           => 'integer|required|min:1|max:50',
                'range_pendapatan'          => 'string|required|max:255',
                'range_pengeluaran'         => 'string|required|max:255',
                'is_hamil'                  => 'in:Ya,Tidak|required',
                'is_menyusui'               => 'in:Ya,Tidak|required',
                'is_balita'                 => 'in:Ya,Tidak|required',
                'gambar'                    => 'image|required|max:5120|mimes:jpeg,jpg,png',
                'detail_pangan_keluarga'    => 'array',
            ]);

            $user = Auth::user();
            $data = $request->all();
            $data['id_kader'] = $user->kader->id_kader;
            $data['id_kecamatan'] = $user->kader->id_kecamatan;

            $tmp_name = null;
            $path = null;

            if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
                $tmp_name = 'tmp_' . time() . '_' . uniqid() . '.' . $request->file('gambar')->getClientOriginalExtension();
                $tmp_path = $request->file('gambar')->storeAs('images', $tmp_name, 'public');
                $path = "storage/$tmp_path";
            }

            // Simpan data keluarga
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
            $keluarga->gambar = $path ?? '';
            $keluarga->save();

            $new_name = "image_{$keluarga->id_keluarga}." . $request->file('gambar')->getClientOriginalExtension();
            $new_path = $request->file('gambar')->storeAs('images', $new_name, 'public');
            $keluarga->gambar = "storage/$new_path";
            $keluarga->save();

            if ($tmp_name) Storage::disk('public')->delete("images/$tmp_name");

            if (!empty($data['detail_pangan_keluarga'])) {
                foreach ($data['detail_pangan_keluarga'] as $pangan) {
                    PanganKeluargaModel::create([
                        'id_keluarga'   => $keluarga->id_keluarga,
                        'id_pangan'     => $pangan['nama_pangan'],
                        'urt'           => $pangan['jumlah_urt']
                    ]);
                }
            }

            DB::commit();
            return response()->json(['redirect' => route('keluarga')]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['errors' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()], 500);
        }
    }

    public function detail(string $id): RedirectResponse|View
    {
        try {
            $keluarga = KeluargaModel::with('desa')->find($id);
            $rentang_uang = RentangUangModel::all()->keyBy('id_rentang_uang');
            $pendapatan = $rentang_uang[$keluarga->rentang_pendapatan]->batas_bawah . ' - ' . $rentang_uang[$keluarga->rentang_pendapatan]->batas_atas;
            $pengeluaran = $rentang_uang[$keluarga->rentang_pengeluaran]->batas_bawah . ' - ' . $rentang_uang[$keluarga->rentang_pengeluaran]->batas_atas;
            $pangan_keluarga = PanganKeluargaModel::where('id_keluarga', $id)->get();
            $pangan = PanganModel::whereIn('id_pangan', $pangan_keluarga->pluck('id_pangan'))->get()->keyBy('id_pangan');

            $pangan_detail = $pangan_keluarga->map(function ($item) use ($pangan) {
                $pangan_item = $pangan->get($item->id_pangan);
                return (object) [
                    'nama_pangan'   => $pangan_item->nama_pangan,
                    'urt'           => $item->urt,
                    'takaran'       => $pangan_item->takaran,
                ];
            });

            return view('pages.surveyor.detail', [
                'keluarga'      => $keluarga,
                'pangan_detail' => $pangan_detail,
                'pendapatan'    => $pendapatan,
                'pengeluaran'   => $pengeluaran,
            ]);
        } catch (Exception $exception) {
            report($exception);
            return to_route('keluarga')->withErrors(['errors' => 'Data tidak ditemukan!']);
        }
    }

    public function edit(string $id): RedirectResponse|View
    {
        try {
            $kader = $this->kader();
            $desa = $this->desa($kader->kecamatan->id_kecamatan);
            $detail_pangan = $this->detail_pangan($id);
            $gambar = KeluargaModel::find($id)->gambar;
            $keluarga = KeluargaModel::with('desa')->find($id);
            $pangan_keluarga = PanganKeluargaModel::with('pangan.takaran')->where('id_keluarga', $id)->get();
            $rentang_uang = $this->rentang_uang();
            $takaran = TakaranModel::pluck('nama_takaran', 'id_takaran')->toArray();
            $nama_pangan = $this->nama_pangan();

            $pangan = [
                'nama_pangan' => $pangan_keluarga->mapWithKeys(fn(PanganKeluargaModel $item) => [
                    $item->id_pangan => ['nama_pangan' => $item->pangan->nama_pangan ?? 'Tidak ditemukan', 'id_takaran' => $item->pangan->id_takaran ?? null]
                ])->toArray(),
                'takaran' => $pangan_keluarga->mapWithKeys(fn(PanganKeluargaModel $item) => [
                    $item->id_pangan => $item->pangan->takaran->nama_takaran ?? 'Takaran tidak ditemukan'
                ])->toArray(),
                'jumlah_takaran' => $pangan_keluarga->mapWithKeys(fn(PanganKeluargaModel $item) => [
                    $item->id_pangan => $item->urt
                ])->toArray(),
            ];

            return view('pages.surveyor.edit-data-keluarga', [
                'desa'              => $desa,
                'detail_pangan'     => $detail_pangan,
                'gambar'            => $gambar,
                'keluarga'          => $keluarga,
                'semua_nama_pangan' => $nama_pangan,
                'semua_takaran'     => $takaran,
                'nama_pangan'       => $pangan['nama_pangan'],
                'takaran'           => $pangan['takaran'],
                'jumlah_takaran'    => $pangan['jumlah_takaran'],
                'rentang_uang'      => $rentang_uang,
            ]);
        } catch (Exception $e) {
            Log::error('Terjadi kesalahan saat mengambil data:', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return to_route('keluarga')->withErrors(['errors' => 'Data tidak ditemukan!']);
        }
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'nama_kepala_keluarga'      => 'string|required|max:255',
                'id_desa'                   => 'string|required|max:255',
                'alamat'                    => 'string|required|max:255',
                'jumlah_keluarga'           => 'integer|required|min:1|max:50',
                'range_pendapatan'          => 'string|required|max:255',
                'range_pengeluaran'         => 'string|required|max:255',
                'is_hamil'                  => 'in:Ya,Tidak|required',
                'is_menyusui'               => 'in:Ya,Tidak|required',
                'is_balita'                 => 'in:Ya,Tidak|required',
                'gambar'                    => 'image|nullable|max:5120|mimes:jpeg,jpg,png',
                'detail_pangan_keluarga'    => 'array',
            ]);

            $keluarga = KeluargaModel::findOrFail($id);
            $old_image = $keluarga->gambar;

            if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
                if ($old_image && Storage::disk('public')->exists(str_replace('storage/', '', $old_image))) Storage::disk('public')->delete(str_replace('storage/', '', $old_image));
                $new_name = "image_{$keluarga->id_keluarga}." . $request->file('gambar')->getClientOriginalExtension();
                $new_path = $request->file('gambar')->storeAs('images', $new_name, 'public');
                $path = "storage/$new_path";
            } else {
                $path = $old_image;
            }

            $keluarga->update([
                'nama_kepala_keluarga'  => $request->nama_kepala_keluarga,
                'id_desa'               => $request->id_desa,
                'alamat'                => $request->alamat,
                'jumlah_keluarga'       => $request->jumlah_keluarga,
                'rentang_pendapatan'    => $request->range_pendapatan,
                'rentang_pengeluaran'   => $request->range_pengeluaran,
                'is_hamil'              => $request->is_hamil,
                'is_menyusui'           => $request->is_menyusui,
                'is_balita'             => $request->is_balita,
                'status'                => Status::MENUNGGU,
                'komentar'              => null,
                'gambar'                => $path,
            ]);

            PanganKeluargaModel::where('id_keluarga', $id)->delete();

            if (!empty($request->detail_pangan_keluarga)) {
                foreach ($request->detail_pangan_keluarga as $item) {
                    PanganKeluargaModel::create([
                        'id_keluarga'   => $id,
                        'id_pangan'     => $item['nama_pangan'],
                        'urt'           => $item['jumlah_urt'],
                    ]);
                }
            }

            DB::commit();
            return to_route('keluarga')->with('success', "Data keluarga {$keluarga->nama_kepala_keluarga} berhasil diperbarui!");
        } catch (ValidationException $exception) {
            DB::rollBack();
            Log::error('Gagal validasi update: ', ['errors' => $exception->errors()]);
            return redirect()->back()->withErrors($exception->errors())->withInput();
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Gagal update data keluarga: ', ['message' => $exception->getMessage(), 'trace' => $exception->getTraceAsString()]);
            return redirect()->back()->withErrors('Terjadi kesalahan: ' . $exception->getMessage());
        }
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            $keluarga = KeluargaModel::findOrFail($id);

            if ($keluarga->gambar && Storage::disk('public')->exists(str_replace('storage/', '', $keluarga->gambar))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $keluarga->gambar));
            }

            PanganKeluargaModel::where('id_keluarga', $id)->delete();
            $keluarga->delete();
            return to_route('keluarga')->with('success', "Data keluarga $keluarga->nama_kepala_keluarga berhasil dihapus!");
        } catch (ModelNotFoundException $exception) {
            report($exception);
            return back()->withErrors(['errors' => 'Data tidak ditemukan!']);
        } catch (Exception $exception) {
            report($exception);
            return back()->withErrors(['errors' => 'Gagal menghapus data!']);
        }
    }

    private function nama_pangan(): array
    {
        return PanganModel::select('id_pangan', 'nama_pangan', 'id_takaran', 'referensi_urt', 'referensi_gram_berat')->orderBy('nama_pangan', 'asc')->get()->mapWithKeys(fn($item) => [$item->id_pangan => (object) [
            'id_pangan'            => $item->id_pangan,
            'nama_pangan'          => $item->nama_pangan,
            'id_takaran'           => $item->id_takaran,
            'referensi_urt'        => $item->referensi_urt,
            'referensi_gram_berat' => $item->referensi_gram_berat,
        ]])->sortBy('nama_pangan')->toArray();
    }

    private function kader(): mixed
    {
        return User::with('kader.kecamatan')->findOrFail(Auth::user()->id_user)->kader;
    }

    private function desa($id_kecamatan): array
    {
        return DesaModel::where('id_kecamatan', $id_kecamatan)->select('id_desa', 'nama_desa', 'kode_wilayah')->get()->mapWithKeys(fn($item) => [$item->id_desa => "$item->nama_desa - $item->kode_wilayah"])->toArray();
    }

    private function detail_pangan($id_keluarga): array
    {
        $pangan_keluarga = PanganKeluargaModel::with('pangan')->where('id_keluarga', $id_keluarga)->select('id_pangan', 'id_keluarga', 'urt')->get();

        $hasil = [];
        foreach ($pangan_keluarga as $data) {
            $hasil[] = [
                'id_pangan'     => $data->id_pangan,
                'id_keluarga'   => $data->id_keluarga,
                'urt'           => $data->urt,
                'pangan_nama'   => $data->pangan->nama_pangan ?? 'Tidak ditemukan'
            ];
        }

        return $hasil;
    }

    private function rentang_uang(): array
    {
        return RentangUangModel::select('id_rentang_uang', 'batas_bawah', 'batas_atas')->get()->mapWithKeys(fn($item) => [$item->id_rentang_uang => "$item->batas_bawah - $item->batas_atas"])->toArray();
    }
}