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
        $user = Auth::user();

        if (!$user) return redirect()->route('masuk');
        if (!in_array($user->tipe, ['admin', 'kader'])) abort(403, 'Anda tidak memiliki akses.');

        $desa = $user->desa ?? collect();
        $keluarga = $user->keluarga ?? collect();
        $kecamatan = $user->kecamatan ?? collect();
        $data_keluarga = $keluarga->map(function ($item) {
            return [
                'nama' => $item->anggota_keluarga_nama,
                'desa' => $item->desa_nama,
                'alamat' => $item->alamat,
                'anggota' => $item->anggota_keluarga_nama,
                'umur' => $item->umur,
                'pangan' => $item->pangan,
            ];
        });

        return match ($user->tipe) {
            'admin' => view('pages.admin.dasbor', [
                'jumlah_desa' => $desa->count(),
                'jumlah_kecamatan' => $kecamatan->count(),
                'jumlah_keluarga' => $keluarga->count(),
            ]),
            'kader' => view('pages.surveyor.dasbor', [
                'jumlah_desa' => $desa->count(),
                'jumlah_keluarga' => $keluarga->count(),
                'data_keluarga' => $data_keluarga,
                'penomoran_halaman' => '',
            ]),
            default => abort(403),
        };
    }
}