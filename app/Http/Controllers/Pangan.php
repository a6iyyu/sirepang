<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
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

    public function detail($id): View
    {
        return view('pages.admin.detail-pangan', ['keluarga' => Keluarga::find($id)]);
    }
}