<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Keluarga as KeluargaModel;
use App\Models\Pangan;
use App\Models\PanganKeluarga;
use App\Models\RentangUang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Verifikasi extends Controller
{
    public function index()
    {
        try {
            // $kader = Auth::user()->kader->id_kader;
            // $data = KeluargaModel::where('id_kader', $kader)->paginate(request()->input('per_page', default: 10));
            $data = KeluargaModel::where('status', Status::BELUM_TERVERIFIKASI)->paginate(request()->input('per_page', default: 10));
            $data->through(fn($item) => (object) [
                'id'   => $item->id_keluarga,
                'nama' => $item->nama_kepala_keluarga,
                'desa' => $item->desa->nama_desa . ' - ' . $item->desa->kode_wilayah,
                'kader' => $item->kader->nama,
                'status' => $item->status
            ]);

            return view('pages.admin.verifikasi-data', [
                'data' => $data,
                'keluarga' => isset($id) ? KeluargaModel::with('desa')->findOrFail($id) : null,
            ]);
        } catch (Exception $exception) {
            Log::error('Terjadi kesalahan saat mengambil data: ' . $exception->getMessage());
            return back()->withErrors(['errors' => 'Data tidak ditemukan!']);
        }
    }


    public function detail($id): RedirectResponse|View
    {
        try {
            $keluarga = KeluargaModel::with('desa')->find($id);
            $rentang_uang = RentangUang::all()->keyBy('id_rentang_uang');
            $pendapatan = $rentang_uang[$keluarga->rentang_pendapatan]->batas_bawah . ' - ' . $rentang_uang[$keluarga->rentang_pendapatan]->batas_atas;
            $pengeluaran = $rentang_uang[$keluarga->rentang_pengeluaran]->batas_bawah . ' - ' . $rentang_uang[$keluarga->rentang_pengeluaran]->batas_atas;
            $pangan_keluarga = PanganKeluarga::where('id_keluarga', $id)->get();
            $pangan = Pangan::whereIn('id_pangan', $pangan_keluarga->pluck('id_pangan'))->get()->keyBy('id_pangan');

            $pangan_detail = $pangan_keluarga->map(function ($item) use ($pangan) {
                $pangan_item = $pangan->get($item->id_pangan);
                return (object) [
                    'nama_pangan'   => $pangan_item->nama_pangan,
                    'urt'           => $item->urt,
                    'takaran'       => $pangan_item->takaran,
                ];
            });

            return view('pages.admin.verifikasi.detail', [
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

    public function approve(Request $request)
    {
        $keluarga = KeluargaModel::find($request->id);
        $keluarga->status = Status::TERVERIFIKASI;
        $keluarga->save();
        return response()->json(['redirect' => route('verifikasi-data')]);
    }
    public function reject(Request $request)
    {
        $keluarga = KeluargaModel::find($request->id);
        $keluarga->status = Status::BELUM_TERVERIFIKASI;
        $keluarga->save();
        return response()->json(['redirect' => route('verifikasi-data')]);
    }
}
