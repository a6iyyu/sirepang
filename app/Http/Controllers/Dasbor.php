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
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

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

    public function data_kecamatan(DateTimeInterface|int|string $tahun): JsonResponse
    {
        $kecamatan = $this->filter_per_tahun($tahun);

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

            $data_keluarga = DB::select("
                SELECT
                    k.id_keluarga,
                    k.nama_kepala_keluarga,
                    k.jumlah_keluarga,
                    d.kode_wilayah AS 'kode_desa',
                    d.nama_desa,
                    c.kode_wilayah AS 'kode_kecamatan',
                    c.nama_kecamatan,
                    jp.nama_jenis AS 'jenis_pangan',
                    g.nama_pangan,
                    pk.urt,
                    ((pk.urt * g.kalori) / k.jumlah_keluarga) AS kalori_per_orang,
                    ((pk.urt * g.lemak) / k.jumlah_keluarga) AS lemak_per_orang,
                    ((pk.urt * g.karbohidrat) / k.jumlah_keluarga) AS karbohidrat_per_orang,
                    ((pk.urt * g.protein) / k.jumlah_keluarga) AS protein_per_orang,
                    g.gram AS 'berat',
                    t.nama_takaran AS 'satuan'
                FROM keluarga k
                JOIN desa d ON d.id_desa = k.id_desa
                JOIN kecamatan c ON c.id_kecamatan = d.id_kecamatan
                JOIN pangan_keluarga pk ON pk.id_keluarga = k.id_keluarga
                JOIN pangan g ON g.id_pangan = pk.id_pangan
                JOIN jenis_pangan jp ON jp.id_jenis_pangan = g.id_jenis_pangan
                JOIN takaran t ON t.id_takaran = g.id_takaran
                ORDER BY k.id_keluarga
            ");

            $data_keluarga = array_map(fn($r) => (array) $r, $data_keluarga);
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $header_kolom = [
                'ID', 'Nama Kepala Keluarga', 'Jumlah Keluarga', 'Kode Desa',
                'Nama Desa', 'Kode Kecamatan', 'Nama Kecamatan', 'Jenis Pangan',
                'Nama Pangan', 'URT', 'Kalori Per Orang', 'Lemak Per Orang',
                'Karbohidrat Per Orang', 'Protein Per Orang', 'Berat', 'Satuan'
            ];

            foreach ($header_kolom as $index => $judul_kolom) {
                $kolom = Coordinate::stringFromColumnIndex($index + 1);
                $sheet->setCellValue("{$kolom}1", $judul_kolom);
            }

            $baris_ke = 2;
            foreach ($data_keluarga as $baris_data) {
                $kolom_ke = 1;
                foreach (
                    [
                        'id_keluarga', 'nama_kepala_keluarga', 'jumlah_keluarga', 'kode_desa',
                        'nama_desa', 'kode_kecamatan', 'nama_kecamatan', 'jenis_pangan',
                        'nama_pangan', 'urt', 'kalori_per_orang', 'lemak_per_orang',
                        'karbohidrat_per_orang', 'protein_per_orang', 'berat', 'satuan'
                    ] as $nama_kolom
                ) {
                    $kolom_excel = Coordinate::stringFromColumnIndex($kolom_ke);
                    $nilai = $baris_data[$nama_kolom] ?? '';
                    $tipe = is_numeric($nilai) ? DataType::TYPE_NUMERIC : DataType::TYPE_STRING;
                    $sheet->setCellValueExplicit("{$kolom_excel}{$baris_ke}", $nilai, $tipe);
                    $kolom_ke++;
                }
                $baris_ke++;
            }

            $kolom_merge = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];
            $baris_awal = 2;
            $id_sebelumnya = $data_keluarga[0]['id_keluarga'] ?? null;

            for ($i = 1; $i < count($data_keluarga); $i++) {
                $id_sekarang = $data_keluarga[$i]['id_keluarga'];
                $baris_sekarang = $i + 2;

                if ($id_sekarang !== $id_sebelumnya) {
                    if ($baris_awal < $baris_sekarang - 1) {
                        foreach ($kolom_merge as $kolom) {
                            $sheet->mergeCells("{$kolom}{$baris_awal}:{$kolom}" . ($baris_sekarang - 1));
                            $sheet->getStyle("{$kolom}{$baris_awal}")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
                        }
                    }
                    $baris_awal = $baris_sekarang;
                    $id_sebelumnya = $id_sekarang;
                }
            }

            $baris_akhir = count($data_keluarga) + 1;
            if ($baris_awal < $baris_akhir) {
                foreach ($kolom_merge as $kolom) {
                    $sheet->mergeCells("{$kolom}{$baris_awal}:{$kolom}{$baris_akhir}");
                    $sheet->getStyle("{$kolom}{$baris_awal}")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
                }
            }

            foreach ($kolom_merge as $kolom) {
                $sheet->getStyle("{$kolom}2:{$kolom}{$baris_akhir}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
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