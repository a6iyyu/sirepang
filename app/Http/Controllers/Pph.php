<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Keluarga;
use App\Models\Keluarga as KeluargaModel;
use App\Models\Kecamatan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Pph extends Controller
{
    public function index(Request $request): View
    {
        $tahun = KeluargaModel::selectRaw('YEAR(created_date) as tahun')->distinct()->orderBy('tahun', 'desc')->pluck('tahun');
        $data_per_tahun = [];

        foreach ($tahun as $daftar) {
            $data = KeluargaModel::with(['kecamatan'])
                ->whereYear('created_date', $daftar)
                ->when($request->id_kecamatan, fn($query) => $query->where('id_kecamatan', $request->id_kecamatan))
                ->get();

            if ($data->isNotEmpty()) $data_per_tahun[$daftar] = $data;
        }

        return view('pages.admin.rekap-pph', [
            'tahun' => $data_per_tahun,
            'kecamatan' => Kecamatan::pluck('nama_kecamatan', 'id_kecamatan')->toArray(),
            'filter' => $request->id_kecamatan
        ]);
    }

    public function export($tahun, Request $request): BinaryFileResponse|RedirectResponse
    {
        try {
            $id_kecamatan = $request->query('id_kecamatan');
            return Excel::download(new Keluarga($tahun, $id_kecamatan), "rekap-pph-{$tahun}.xlsx");
        } catch (Exception $exception) {
            Log::error('Terjadi kesalahan saat mengambil data: ' . $exception->getMessage());
            return back()->withErrors(['errors' => 'Data tidak ditemukan!']);
        }
    }
}