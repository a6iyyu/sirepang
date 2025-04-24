<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Desa as DesaModel;
use App\Models\JenisPangan as JenisPanganModel;
use App\Models\Kecamatan as KecamatanModel;
use App\Models\Pangan as PanganModel;
use App\Models\Keluarga as KeluargaModel;
use App\Models\PanganKeluarga as PanganKeluargaModel;
use Illuminate\View\View;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class Kecamatan extends Controller
{
    public function index(): View
    {
        $data = DesaModel::selectRaw('id_kecamatan, COUNT(*) as jumlah_desa')
            ->with('kecamatan:id_kecamatan,nama_kecamatan')
            ->groupBy('id_kecamatan')
            ->paginate(request('per_page', 7))
            ->through(fn($item) => (object) [
                'id' => $item->id_kecamatan,
                'jumlah_desa' => $item->jumlah_desa,
                'nama_kecamatan' => $item->kecamatan->nama_kecamatan,
            ]);

        return view('pages.admin.data-kecamatan', ['data' => $data]);
    }

    public function detail($id): View
    {
        $desa = DesaModel::where('id_kecamatan', $id)->select('nama_desa', 'kode_wilayah')->get();
        $kecamatan = KecamatanModel::find($id);

        return view('pages.admin.detail-kecamatan', [
            'desa'      => $desa,
            'kecamatan' => $kecamatan->nama_kecamatan,
        ]);
    }

    public function rekap_kecamatan(string $id): View
    {
        $kecamatan = KecamatanModel::find($id)->toArray();
        $tahun = KeluargaModel::selectRaw('YEAR(created_date) as tahun')
            ->where('id_kecamatan', $id)
            ->distinct()
            ->pluck('tahun');

        return view('pages.admin.rekap-kecamatan', compact('tahun','kecamatan'));
    }

    public function ekspor_rekap(string $tahun): never
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue("B1", "Jenis Pangan")->mergeCells("B1:B3");
        $sheet->getStyle("B1:B3")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle("B1:B3")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue("C1", "DBKM SUSENAS")->mergeCells("C1:G1");
        $sheet->getStyle("C1:G1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue("C3", "Berat (gr)");
        $sheet->setCellValue("D3", "Energi (kkal)");
        $sheet->setCellValue("E3", "Protein (gr)");
        $sheet->setCellValue("F3", "Lemak (gr)");
        $sheet->setCellValue("G3", "Karbo (gr)");
        $sheet->setCellValue("B4", "Contoh Pangan");
        $sheet->setCellValue("C4", "1000");
        $sheet->setCellValue("D4", "2500");
        $sheet->setCellValue("E4", "90");
        $sheet->setCellValue("F4", "30");
        $sheet->setCellValue("G4", "400");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . 'Data_Rekap_AMpelG' . date('Y-m-d_H-i-s') . '.xlsx' . '"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
}