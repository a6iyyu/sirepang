<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Desa as DesaModel;
use App\Models\Kecamatan as KecamatanModel;
use Illuminate\View\View;

class Kecamatan extends Controller
{
    public function index(): View
    {
        $data = DesaModel::selectRaw('id_kecamatan, COUNT(*) as jumlah_desa')
            ->with('kecamatan:id_kecamatan,nama_kecamatan')
            ->groupBy('id_kecamatan')
            ->paginate(request('per_page', 7))
            ->through(fn($item) => (object) [
                'id' => $item->id_kecamatan,
                'jumlah_desa' => $item->jumlah_desa,
                'nama_kecamatan' => $item->kecamatan->nama_kecamatan,
            ]);

        return view('pages.admin.data-kecamatan', ['data' => $data]);
    }

    public function detail($id): View
    {
        $desa = DesaModel::where('id_kecamatan', $id)->select('nama_desa', 'kode_wilayah')->get();
        $kecamatan = KecamatanModel::find($id);

        return view('pages.admin.detail-kecamatan', [
            'desa'      => $desa,
            'kecamatan' => $kecamatan->nama_kecamatan,
        ]);
    }
}