<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use App\Models\Pangan as PanganModel;
use App\Models\PanganKeluarga;
use App\Models\RentangUang;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class Pangan extends Controller
{
    public function index(): View
    {
        $data = Keluarga::paginate(10);
        $data->getCollection()->transform(fn($item) => (object) [
            'id'    => $item->id_keluarga,
            'nama'  => $item->nama_kepala_keluarga,
            'desa'  => $item->desa->nama_desa,
        ]);

        return view('pages.admin.rekap-pangan', ['data' => $data]);
    }

    public function detail($id): RedirectResponse|View
    {
        try {
            $keluarga = Keluarga::with('desa')->find($id);
            $rentang_uang = RentangUang::all()->keyBy('id_rentang_uang');
            $pendapatan = $rentang_uang[$keluarga->rentang_pendapatan]->batas_bawah . ' - ' . $rentang_uang[$keluarga->rentang_pendapatan]->batas_atas;
            $pengeluaran = $rentang_uang[$keluarga->rentang_pengeluaran]->batas_bawah . ' - ' . $rentang_uang[$keluarga->rentang_pengeluaran]->batas_atas;
            $pangan_keluarga = PanganKeluarga::where('id_keluarga', $id)->get();
            $pangan = PanganModel::whereIn('id_pangan', $pangan_keluarga->pluck('id_pangan'))->get()->keyBy('id_pangan');

            $pangan_detail = $pangan_keluarga->map(function ($item) use ($pangan) {
                $pangan_item = $pangan->get($item->id_pangan);
                return (object) [
                    'nama_pangan'   => $pangan_item->nama_pangan,
                    'urt'           => $item->urt,
                    'takaran'       => $pangan_item->takaran,
                ];
            });

            return view('pages.admin.detail-pangan', [
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
}