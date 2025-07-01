<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Keluarga as KeluargaModel;
use DateTimeInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;

class Dasbor extends Controller
{
    public function show(): RedirectResponse|View
    {
        $user = Auth::user();
        $data = KeluargaModel::where('id_kader', $user->kader->id_kader ?? null)->paginate(request()->input('per_page', 10));
        $data->through(fn(KeluargaModel $item) => (object) [
            'id'   => $item->id_keluarga,
            'nama' => $item->nama_kepala_keluarga,
            'desa' => $item->desa->nama_desa,
        ])->links();

        $tahun = KeluargaModel::selectRaw('DISTINCT YEAR(created_date) as tahun')->orderBy('tahun', 'desc')->pluck('tahun');
        $kecamatan = $this->filter_per_tahun(2025);

        if (!$user) return to_route('masuk');
        if (!in_array($user->tipe, ['admin', 'kader'])) abort(403, 'Anda tidak memiliki akses.');

        return match ($user->tipe) {
            'admin' => view('pages.admin.dasbor', [
                'jumlah_desa'          => KeluargaModel::distinct('id_desa')->count('id_desa'),
                'jumlah_kecamatan'     => KeluargaModel::distinct('id_kecamatan')->count('id_kecamatan'),
                'jumlah_keluarga'      => KeluargaModel::count(),
                'tahun'                => $tahun,
                'grafik_kecamatan'     => $kecamatan->map(fn($item) => [
                    'x' => $item->nama_kecamatan,
                    'y' => $item->total_keluarga,
                ]),
            ]),
            'kader' => view('pages.surveyor.dasbor', [
                'data'              => $data,
                'jumlah_desa'       => KeluargaModel::where('id_kader', $user->kader->id_kader ?? null)->distinct('id_desa')->count('id_desa'),
                'jumlah_keluarga'   => KeluargaModel::where('id_kader', $user->kader->id_kader ?? null)->count(),
            ]),
        };
    }

    public function search(Request $request): JsonResponse|RedirectResponse
    {
        $keyword = $request->input('q');
        $data = KeluargaModel::where('id_kader', Auth::user()->kader->id_kader)
            ->where('nama_kepala_keluarga', 'like', "%{$keyword}%")
            ->get()
            ->map(fn(KeluargaModel $item) => [
                'id'        => $item->id_keluarga,
                'nama'      => $item->nama_kepala_keluarga,
                'desa'      => $item->desa->nama_desa,
                'status'    => $item->status,
                'komentar'  => $item->komentar,
                'detail'    => route('keluarga.detail', $item->id_keluarga),
                'edit'      => route('keluarga.edit', $item->id_keluarga),
                'hapus'     => route('keluarga.hapus', $item->id_keluarga),
            ]);

        if ($data->isEmpty()) return Response::json([], 200);
        return response()->json($data);
    }

    public function data_kecamatan($tahun_dipilih): JsonResponse
    {
        $kecamatan = $this->filter_per_tahun($tahun_dipilih);

        /** @var Collection<int, KeluargaModel> $data */
        $data = $kecamatan->map(fn($item) => [
            'x' => $item->nama_kecamatan,
            'y' => $item->total_keluarga,
        ]);

        return response()->json($data);
    }

    private function filter_per_tahun(DateTimeInterface|int|string $tahun): Collection
    {
        return KeluargaModel::join('kecamatan', 'keluarga.id_kecamatan', '=', 'kecamatan.id_kecamatan')
            ->selectRaw('kecamatan.id_kecamatan, kecamatan.nama_kecamatan, COUNT(keluarga.id_keluarga) as total_keluarga')
            ->whereYear('keluarga.created_date', $tahun)
            ->groupBy('kecamatan.id_kecamatan', 'kecamatan.nama_kecamatan')
            ->get();
    }
}