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
        $data = KeluargaModel::where('id_kader', $user->kader->id_kader ?? null)->paginate(request()->input('per_page', 10));
        $data->through(fn($item) => (object) [
            'id'    => $item->id_keluarga,
            'nama'  => $item->nama_kepala_keluarga,
            'desa'  => $item->desa->nama_desa,
        ])->links();

        if (!$user) return redirect()->route('masuk');
        if (!in_array($user->tipe, ['admin', 'kader'])) abort(403, 'Anda tidak memiliki akses.');

        return match ($user->tipe) {
            'admin' => view('pages.admin.dasbor', [
                'jumlah_desa'       => KeluargaModel::distinct('id_desa')->count('id_desa'),
                'jumlah_kecamatan'  => KeluargaModel::distinct('id_kecamatan')->count('id_kecamatan'),
                'jumlah_keluarga'   => KeluargaModel::count(),
            ]),
            'kader' => view('pages.surveyor.dasbor', [
                'data'                  => $data,
                'jumlah_desa'           => KeluargaModel::where('id_kader', $user->kader->id_kader ?? null)->distinct('id_desa')->count('id_desa'),
                'jumlah_keluarga'       => KeluargaModel::where('id_kader', $user->kader->id_kader ?? null)->count(),
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