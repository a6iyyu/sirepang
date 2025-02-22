<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class Dasbor extends Controller
{
    /**
     * Views
     */
    public function show(): View
    {
        $desa = Auth::user()->desa;
        $keluarga = Auth::user()->keluarga;
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

        if (Auth::user()->tipe == 'admin') {
            return view('pages.admin.dasbor', []);
        } elseif (Auth::user()->tipe == 'kader') {
            return view('pages.surveyor.dasbor', [
                'jumlah_desa' => $desa->count(),
                'jumlah_keluarga' => $keluarga->count(),
                'data_keluarga' => $data_keluarga,
                'penomoran_halaman' => '',
            ]);
        } else {
            // Handle other user types or redirect to a default page
            return redirect()->route('/masuk');
        }
    }
}
