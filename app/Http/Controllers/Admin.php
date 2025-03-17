<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JenisPangan;
use App\Models\Keluarga;
use App\Models\Pangan;
use App\Models\PanganKeluarga;
use App\Models\RentangUang;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class Admin extends Controller
{
    /**
     * Views
     */
    public function index(): View
    {
        $data = Keluarga::paginate(request()->input('per_page', 10));
        $data->through(fn($item) => (object) [
            'id'                    => $item->id_keluarga,
            'nama'                  => $item->nama_kepala_keluarga,
            'alamat'                => $item->alamat,
            'desa'                  => $item->desa->nama_desa,
            'kecamatan'             => $item->kecamatan->nama_kecamatan,
        ])->links();
        
        return view('pages.admin.data-kecamatan', ['data' => $data]);
    }

    public function detail($id): RedirectResponse|View
    {
        try {
            $keluarga = Keluarga::with('desa')->find($id);
            $rentang_uang = RentangUang::all()->keyBy('id_rentang_uang');
            $pendapatan = $rentang_uang[$keluarga->rentang_pendapatan]->batas_bawah . ' - ' . $rentang_uang[$keluarga->rentang_pendapatan]->batas_atas;
            $pengeluaran = $rentang_uang[$keluarga->rentang_pengeluaran]->batas_bawah . ' - ' . $rentang_uang[$keluarga->rentang_pengeluaran]->batas_atas;
            $pangan_keluarga = PanganKeluarga::where('id_keluarga', $id)->get();
            $pangan_id = $pangan_keluarga->pluck('id_pangan');
            $pangan = Pangan::whereIn('id_pangan', $pangan_id)->get()->keyBy('id_pangan');
            $jenis_pangan = JenisPangan::whereIn('id_jenis_pangan', $pangan->pluck('id_jenis_pangan'))->get()->keyBy('id_jenis_pangan');

            $pangan_detail = $pangan_keluarga->map(function ($item) use ($pangan, $jenis_pangan) {
                $pangan_item = $pangan->get($item->id_pangan);
                return (object) [
                    'nama_pangan'   => $pangan_item->nama_pangan,
                    'jenis_pangan'  => $jenis_pangan->get($pangan_item->id_jenis_pangan)->nama_jenis,
                    'urt'           => $item->urt,
                    'takaran'       => $pangan_item->takaran,
                ];
            });

            return view('pages.admin.detail', [
                'keluarga'      => $keluarga,
                'pangan_detail' => $pangan_detail,
                'pendapatan'    => $pendapatan,
                'pengeluaran'   => $pengeluaran,
            ]);
        } catch (Exception $exception) {
            Log::error('Terjadi kesalahan saat mengambil data: ' . $exception->getMessage());
            return redirect()->route('keluarga')->withErrors(['errors' => 'Data tidak ditemukan!']);
        }
    }

    public function edit(): View
    {
        return view('');
    }


    /**
     * Controllers
     */
    public function delete($id): RedirectResponse
    {
        try {
            PanganKeluarga::where('id_keluarga', $id)->delete();
            Keluarga::where('id_keluarga', $id)->firstOrFail()->delete();
            return redirect()->route('keluarga')->with('success', 'Data keluarga berhasil dihapus!');
        } catch (ModelNotFoundException $exception) {
            return back()->withErrors(['errors' => 'Data tidak ditemukan!']);
        } catch (Exception $exception) {
            Log::error('Terjadi kesalahan saat menghapus data: ' . $exception->getMessage());
            return back()->withErrors(['errors' => 'Gagal menghapus data!']);
        }
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        try {
            return redirect()->route('data-kecamatan')->with('success', 'Data keluarga berhasil diperbarui!');
        } catch (Exception $exception) {
            Log::error('Terjadi kesalahan saat memperbarui data: ' . $exception->getMessage());
            return back()->withErrors(['errors' => 'Gagal memperbarui data!']);
        }
    }

    public function foods() {}

    public function pph() {}
}