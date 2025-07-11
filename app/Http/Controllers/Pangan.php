<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Keluarga;
use App\Models\Pangan as PanganModel;
use App\Models\PanganKeluarga;
use App\Models\RentangUang;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class Pangan extends Controller
{
    public function index(Request $request): View
    {
        $query = Keluarga::query();

        if ($request->filled('kecamatan')) {
            $query->where('id_kecamatan', $request->input('kecamatan'));
        }

        if ($request->filled('desa')) {
            $query->where('id_desa', $request->input('desa'));
        }

        if ($request->filled('nama_kepala_keluarga')) {
            $query->where('nama_kepala_keluarga', 'like', '%' . $request->input('nama_kepala_keluarga') . '%');
        }

        $data = $query->with(['kecamatan', 'desa'])->paginate(10)->withQueryString();
        $data->getCollection()->transform(fn($item) => (object) [
            'id'        => $item->id_keluarga,
            'nama'      => $item->nama_kepala_keluarga,
            'desa'      => $item->desa->nama_desa,
            'kecamatan' => $item->kecamatan->nama_kecamatan,
        ]);

        $desa = Desa::pluck('nama_desa', 'id_desa')->toArray();
        $kecamatan = Kecamatan::pluck('nama_kecamatan', 'id_kecamatan')->toArray();

        $desa_berdasarkan_kecamatan = Desa::select('id_desa', 'nama_desa', 'id_kecamatan')
            ->get()
            ->groupBy('id_kecamatan')
            ->map(fn(Collection $daftar) => $daftar->pluck('nama_desa', 'id_desa')->toArray())
            ->toArray();

        return view('pages.admin.rekap-pangan', compact('data', 'desa', 'kecamatan', 'desa_berdasarkan_kecamatan'));
    }

    public function detail(int|string $id): RedirectResponse|View
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
            Log::error('Terjadi kesalahan pada server: ' . $exception->getMessage());
            report($exception);
            return to_route('keluarga')->withErrors(['errors' => 'Data tidak ditemukan!']);
        }
    }
}
