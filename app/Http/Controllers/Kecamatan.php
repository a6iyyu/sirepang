<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Desa as DesaModel;
use App\Models\Kecamatan as KecamatanModel;
use App\Models\Keluarga as KeluargaModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Throwable;

class Kecamatan extends Controller
{
    public function index(): View
    {
        $data = DesaModel::selectRaw('id_kecamatan, COUNT(*) as jumlah_desa')
            ->with('kecamatan:id_kecamatan,nama_kecamatan')
            ->groupBy('id_kecamatan')
            ->paginate(request('per_page', 7))
            ->through(fn($item) => (object) [
                'id'                => $item->id_kecamatan,
                'jumlah_desa'       => $item->jumlah_desa,
                'nama_kecamatan'    => $item->kecamatan->nama_kecamatan,
            ]);

        return view('pages.admin.data-kecamatan', compact('data'));
    }

    public function detail($id): View
    {
        $desa = DesaModel::where('id_kecamatan', $id)->select('nama_desa', 'kode_wilayah')->get();
        $kecamatan = KecamatanModel::find($id);
        return view('pages.admin.detail-kecamatan', ['desa' => $desa, 'kecamatan' => $kecamatan->nama_kecamatan]);
    }

    public function rekap_kecamatan(string $id): View
    {
        $kecamatan = KecamatanModel::find($id)->toArray();
        $tahun = KeluargaModel::selectRaw('YEAR(created_date) as tahun')->where('id_kecamatan', $id)->distinct()->pluck('tahun');
        return view('pages.admin.rekap-kecamatan', compact('id', 'tahun', 'kecamatan'));
    }

    public function ekspor_rekap(int|string $id, int|string $th): never
    {
        try {
            $kecamatan = KecamatanModel::findOrFail($id);

            $hasil = DB::select("
                SELECT 
                    d.nama_desa AS nama_desa,
                    jp.nama_jenis AS nama_jenis,
                    g.nama_pangan AS nama_pangan,
                    AVG(((pk.urt * g.kalori) / k.jumlah_keluarga)) AS kalori_per_orang,
                    AVG(((pk.urt * g.lemak) / k.jumlah_keluarga)) AS lemak_per_orang,
                    AVG(((pk.urt * g.karbohidrat) / k.jumlah_keluarga)) AS karbohidrat_per_orang,
                    AVG(((pk.urt * g.protein) / k.jumlah_keluarga)) AS protein_per_orang,
                    MAX(g.gram) AS berat,
                    MAX(t.nama_takaran) AS satuan
                FROM keluarga k
                JOIN desa d ON d.id_desa = k.id_desa
                JOIN kecamatan c ON c.id_kecamatan = d.id_kecamatan
                JOIN pangan_keluarga pk ON pk.id_keluarga = k.id_keluarga
                JOIN pangan g ON g.id_pangan = pk.id_pangan
                JOIN jenis_pangan jp ON jp.id_jenis_pangan = g.id_jenis_pangan
                JOIN takaran t ON t.id_takaran = g.id_takaran
                WHERE c.id_kecamatan = ? AND YEAR(k.created_date) = ?
                GROUP BY g.nama_pangan, jp.nama_jenis, d.nama_desa, c.nama_kecamatan
                ORDER BY c.nama_kecamatan, d.nama_desa, jp.nama_jenis, g.nama_pangan
            ", [$id, $th]);

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->setCellValue("A1", "Desa");
            $sheet->setCellValue("B1", "Jenis Pangan");
            $sheet->setCellValue("C1", "Nama Pangan");
            $sheet->setCellValue("D1", "Kalori Per Orang");
            $sheet->setCellValue("E1", "Lemak Per Orang");
            $sheet->setCellValue("F1", "Karbohidrat Per Orang");
            $sheet->setCellValue("G1", "Protein Per Orang");
            $sheet->setCellValue("H1", "Berat");
            $sheet->setCellValue("I1", "Satuan");

            $row = 2;
            foreach ($hasil as $item) {
                $sheet->setCellValue("A{$row}", $item->nama_desa);
                $sheet->setCellValue("B{$row}", $item->nama_jenis);
                $sheet->setCellValue("C{$row}", $item->nama_pangan);
                $sheet->setCellValue("D{$row}", round(floatval($item->kalori_per_orang), 2));
                $sheet->setCellValue("E{$row}", round(floatval($item->lemak_per_orang), 2));
                $sheet->setCellValue("F{$row}", round(floatval($item->karbohidrat_per_orang), 2));
                $sheet->setCellValue("G{$row}", round(floatval($item->protein_per_orang), 2));
                $sheet->setCellValue("H{$row}", $item->berat);
                $sheet->setCellValue("I{$row}", $item->satuan);
                $row++;
            }

            foreach (range('A', 'I') as $col) {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            }

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Rekap Pangan ' . $kecamatan->nama_kecamatan . ' ' . date('d-m-Y') . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save('php://output');
            exit;
        } catch (Throwable $throwable) {
            report($throwable);
            Log::error('Terjadi kesalahan saat mengekspor rekap per kecamatan: ' . $throwable->getMessage());
            abort(500, 'Terjadi kesalahan saat mengekspor rekap per kecamatan!');
        }
    }
}