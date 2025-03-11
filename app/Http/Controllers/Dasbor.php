<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Keluarga as KeluargaModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class Dasbor extends Controller
{
    public function show(): RedirectResponse|View
    {
        $user = Auth::user();
        $data = KeluargaModel::where('id_kader', $user->kader->id_kader)
            ->get()
            ->map(function ($item) {
                return (object) [
                    'id' => $item->id_keluarga,
                    'nama' => $item->nama_kepala_keluarga,
                    'desa' => $item->desa->nama_desa,
                ];
            });

        if (!$user) return redirect()->route('masuk');
        if (!in_array($user->tipe, ['admin', 'kader'])) abort(403, 'Anda tidak memiliki akses.');

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
                'jumlah_kecamatan' => $kecamatan->count(),
                'jumlah_keluarga' => $keluarga->count(),
                'jumlah_desa' => $keluarga->unique('id_desa')->count(),
            ]),
            'kader' => view('pages.surveyor.dasbor', [
                'data' => $data,
                'jumlah_desa' => $keluarga->unique('id_desa')->count(),
                'jumlah_keluarga' => $keluarga->count(),
                'data_keluarga' => $data_keluarga,
                'penomoran_halaman' => '',
            ]),
            default => abort(403),
        };
    }
}