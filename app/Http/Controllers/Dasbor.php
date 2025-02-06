<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class Dasbor extends Controller
{
    public function show(): View
    {
        $desa = Auth::user()->kader->kecamatan->desa;
        $keluarga = Auth::user()->kader->kecamatan->keluarga;
        $data_keluarga = $keluarga->map(function ($item) {
            return [
                'nama' => $item->anggota_keluarga_nama,
                'desa' => $item->desa_nama,
                'alamat' => $item->alamat,
                'anggota' => $item->anggota_keluarga_nama,
                'umur' => $item->umur,
                'pangan' => $item->pagan,
            ];
        });

        return view('pages.dasbor', [
            'jumlah_desa' => $desa->count(),
            'jumlah_keluarga' => $keluarga->count(),
            'data_keluarga' => $data_keluarga,
            'penomoran_halaman' => '',
        ]);
    }
}