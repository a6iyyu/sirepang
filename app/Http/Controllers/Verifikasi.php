<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Keluarga as KeluargaModel;
use App\Models\Pangan as PanganModel;
use App\Models\PanganKeluarga as PanganKeluargaModel;
use App\Models\RentangUang as RentangUangModel;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;

class Verifikasi extends Controller
{
    public function index(): RedirectResponse|View
    {
        try {
            $data = KeluargaModel::where('status', Status::MENUNGGU)->paginate(request()->input('per_page', default: 10));
            $data->through(fn($item) => (object) [
                'id'        => $item->id_keluarga,
                'nama'      => $item->nama_kepala_keluarga,
                'desa'      => $item->desa->nama_desa . ' - ' . $item->desa->kode_wilayah,
                'kader'     => $item->kader->nama,
                'kecamatan' => $item->kecamatan->nama_kecamatan,
                'status'    => $item->status
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

            return view('pages.admin.detail-verifikasi-data', [
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

    public function verify(Request $request, string $status): JsonResponse
    {
        if ($status === 'DITOLAK') {
            $request->validate([
                'komentar' => 'required|max:200|string'
            ], [
                'komentar.required' => 'Bidang ini perlu diisi.',
                'komentar.max'      => 'Tidak boleh lebih dari 200 karakter.',
            ]);
        }

        $keluarga = KeluargaModel::where('id_keluarga', $request->id)->first();
        if (!$keluarga) return Response::json(['error' => 'Data keluarga tidak ditemukan.'], 404);

        $keluarga->status = $status;
        if ($status === 'DITOLAK') $keluarga->komentar = $request->komentar;
        $keluarga->save();
        return Response::json(['redirect' => route('verifikasi-data')]);
    }
}