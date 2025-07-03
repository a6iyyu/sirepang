<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Keluarga as KeluargaModel;
use DateTimeInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

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

    public function data_kecamatan(DateTimeInterface|int|string $tahun_dipilih): JsonResponse
    {
        $kecamatan = $this->filter_per_tahun($tahun_dipilih);

        /** @var Collection<int, KeluargaModel> $data */
        $data = $kecamatan->map(fn($item) => [
            'x' => $item->nama_kecamatan,
            'y' => $item->total_keluarga,
        ]);

        return response()->json($data);
    }

    public function rekap_keseluruhan(): RedirectResponse
    {
        try {
            ini_set('memory_limit', '2048M');

            $keluarga = DB::select("
                SELECT 
                    k.id_keluarga,
                    k.nama_kepala_keluarga,
                    k.jumlah_keluarga,
                    c.kode_wilayah,
                    d.nama_desa,
                    c.nama_kecamatan,
                    jp.nama_jenis,
                    g.nama_pangan,
                    g.kalori,
                    g.lemak,
                    g.karbohidrat,
                    g.protein
                FROM keluarga k
                JOIN desa d ON d.id_desa = k.id_desa
                JOIN kecamatan c ON c.id_kecamatan = d.id_kecamatan
                JOIN pangan_keluarga pk ON pk.id_keluarga = k.id_keluarga
                JOIN pangan g ON g.id_pangan = pk.id_pangan
                JOIN jenis_pangan jp ON jp.id_jenis_pangan = g.id_jenis_pangan;
            ");

            $keluarga = json_decode(json_encode($keluarga), true);

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $headers = [
                'ID Keluarga', 'Nama Kepala Keluarga', 'Jumlah Keluarga', 'Kode Wilayah',
                'Nama Desa', 'Nama Kecamatan', 'Jenis Pangan', 'Nama Pangan',
                'Kalori Per Orang', 'Lemak Per Orang', 'Karbohidrat Per Orang', 'Protein Per Orang'
            ];

            foreach ($headers as $index => $header) {
                $col = Coordinate::stringFromColumnIndex($index + 1);
                $sheet->setCellValue("{$col}1", $header);
            }

            $number = 2;
            foreach ($keluarga as $row) {
                $colNumber = 1;
                foreach ([
                    'id_keluarga', 'nama_kepala_keluarga', 'jumlah_keluarga', 'kode_wilayah',
                    'nama_desa', 'nama_kecamatan', 'nama_jenis', 'nama_pangan',
                    'kalori', 'lemak', 'karbohidrat', 'protein'
                ] as $key) {
                    $col = Coordinate::stringFromColumnIndex($colNumber);
                    $sheet->setCellValue("{$col}{$number}", $row[$key]);
                    $colNumber++;
                }
                $number++;
            }

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Data Rekap Keseluruhan ' . date('d-m-Y') . '.xlsx"');
            header('Cache-Control: max-age=0');
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
            header('Cache-Control: cache, must-revalidate');
            header('Pragma: public');

            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save('php://output');
            exit;
        } catch (Exception $exception) {
            report($exception);
            Log::error('Terjadi kesalahan saat mengunduh data keseluruhan: ' . $exception->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengunduh data keseluruhan.');
        }
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