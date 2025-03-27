<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use Illuminate\View\View;

class Pangan extends Controller
{
    public function index(): View
    {
        $data = Keluarga::all()->map(fn($item) => (object) [
            'id'            => $item->id_keluarga,
            'nama_keluarga' => $item->nama_kepala_keluarga,
            'nama_desa'     => $item->desa->nama_desa,
        ]);

        return view('pages.admin.rekap-pangan', ['data' => $data]);
    }

    public function detail($id)
    {
        $data = Keluarga::find($id);
        return view('pages.admin.detail-pangan', ['data' => $data]);
    }
}