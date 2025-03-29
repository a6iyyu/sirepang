<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KeluargaDataExport;
use App\Models\Keluarga;
use App\Models\Kecamatan;

class Pph extends Controller
{
    public function index(Request $request): View
    {
        $tahun = Keluarga::selectRaw('YEAR(created_date) as tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        $dataPerTahun = [];
        foreach ($tahun as $t) {
            $data = Keluarga::with(['kecamatan'])
                ->whereYear('created_date', $t)
                ->when($request->kecamatan_filter, function ($query) use ($request) {
                    return $query->where('id_kecamatan', $request->kecamatan_filter);
                })
                ->get();

            if ($data->isNotEmpty()) {
                $dataPerTahun[$t] = $data;
            }
        }

        return view('pages.admin.rekap-pph', [
            'dataTahun' => $dataPerTahun,
            'kecamatans' => Kecamatan::pluck('nama_kecamatan', 'id_kecamatan'),
            'currentFilter' => $request->kecamatan_filter
        ]);
    }

    public function export($tahun, Request $request)
    {
        $kecamatanId = $request->query('kecamatan_filter');
        return Excel::download(
            new KeluargaDataExport($tahun, $kecamatanId),
            "rekap-pph-{$tahun}.xlsx"
        );
    }
}
