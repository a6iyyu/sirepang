<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Keluarga as KeluargaModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class Dasbor extends Controller
{
    public function show(): RedirectResponse|View
    {
        $user = Auth::user();
        $kecamatan = $user->kecamatan ?? collect();
        $keluarga = $user->keluarga ?? collect();
        $data = KeluargaModel::where('id_kader', $user->kader->id_kader)
            ->get()
            ->map(fn($item) => (object) [
                'id'    => $item->id_keluarga,
                'nama'  => $item->nama_kepala_keluarga,
                'desa'  => $item->desa->nama_desa,
            ]);

        if (!$user) return redirect()->route('masuk');
        if (!in_array($user->tipe, ['admin', 'kader'])) abort(403, 'Anda tidak memiliki akses.');

        return match ($user->tipe) {
            'admin' => view('pages.admin.dasbor', [
                'jumlah_kecamatan'  => $kecamatan->count(),
                'jumlah_keluarga'   => $keluarga->count(),
                'jumlah_desa'       => $keluarga->unique('id_desa')->count(),
            ]),
            'kader' => view('pages.surveyor.dasbor', [
                'data'                  => $data,
                'jumlah_desa'           => $keluarga->unique('id_desa')->count(),
                'jumlah_keluarga'       => $keluarga->count(),
                'penomoran_halaman'     => '',
            ]),
            default => abort(403),
        };
    }

    public function search(Request $request): JsonResponse|RedirectResponse
    {
        $keyword = $request->input('q');
        $data = KeluargaModel::where('id_kader', Auth::user()->kader->id_kader)
            ->where('nama_kepala_keluarga', 'like', "%{$keyword}%")
            ->get()
            ->map(fn($item) => [
                'id'        => $item->id_keluarga,
                'nama'      => $item->nama_kepala_keluarga,
                'desa'      => $item->desa->nama_desa,
                'detail'    => route('keluarga.detail', $item->id_keluarga),
                'hapus'     => route('keluarga.hapus', $item->id_keluarga),
            ]);

        if ($data->isEmpty()) return redirect()->back()->withInput()->with('message', 'Data tidak ditemukan!');
        return response()->json($data);
    }
}