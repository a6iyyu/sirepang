<?php

declare(strict_types=1);

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
        return view('pages.admin.detail-kecamatan', ['desa' => $desa, 'kecamatan' => $kecamatan->nama_kecamatan]);
    }

    public function rekap_kecamatan(string $id): View
    {
        $kecamatan = KecamatanModel::find($id)->toArray();
        $tahun = KeluargaModel::selectRaw('YEAR(created_date) as tahun')->where('id_kecamatan', $id)->distinct()->pluck('tahun');
        return view('pages.admin.rekap-kecamatan', compact('id', 'tahun', 'kecamatan'));
    }

    public function export_rekap($id, $th)
    {
        $kecamatan = KecamatanModel::find($id);
        // dd($kecamatan);
        $kk = KeluargaModel::where('id_kecamatan', $id)
            ->whereYear('created_date', $th)
            ->sum('jumlah_keluarga');

        $year = (int) $th;
        $isLeapYear = date('L', mktime(0, 0, 0, 1, 1, $year));
        $daysInYear = $isLeapYear ? 366 : 365;

        $currentYear = (int) date('Y');
        if ($year == $currentYear) {
            $daysInYear = date('z') + 1; // jumlah hari 'jika' tahun ini
        }

        $jenis_pangan = JenisPanganModel::select('id_jenis_pangan', 'nama_jenis', 'parent')->where('parent', "=", null)->get()->toArray();
        $sub_jenis_pangan = JenisPanganModel::select('id_jenis_pangan', 'nama_jenis', 'parent')->where('parent', "!=", null)->get()->toArray();
        $pangan = PanganModel::with('jenis_pangan')->get()->toArray();

        $pangan_list = collect($pangan)->map(function ($data) {
            return [
                'id_jenis_pangan' => $data['jenis_pangan']['id_jenis_pangan'],
                'nama_jenis' => $data['jenis_pangan']['nama_jenis'],
                'id_pangan' => $data['id_pangan'],
                'nama_pangan' => $data['nama_pangan'],
                'berat' => $data['gram'],
                'energi' => $data['kalori'],
                'protein' => $data['protein'],
                'lemak' => $data['lemak'],
                'karbohidrat' => $data['karbohidrat'],
                'referensi_urt' => $data['referensi_urt'],
            ];
        });

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue("B1", "Jenis Pangan")->mergeCells("B1:B3");
        $sheet->getStyle("B1")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle("B1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue("C1", "DBKM SUSENAS")->mergeCells("C1:G1");
        $sheet->getStyle("C1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue("H1", "Rata - Rata Konsumsi per Kapita / Minggu")->mergeCells("H1:K1");
        $sheet->getStyle("H1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue("C3", "Berat (gr)");
        $sheet->setCellValue("D3", "Energi (kkal)");
        $sheet->setCellValue("E3", "Protein (gr)");
        $sheet->setCellValue("F3", "Lemak (gr)");
        $sheet->setCellValue("G3", "Karbo (gr)");
        $sheet->setCellValue("H2", "Wilayah")->mergeCells("H2:K2");
        $sheet->getStyle("H2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue("H3", "Satuan");
        $sheet->setCellValue("I3", "Jumlah");
        $sheet->setCellValue("J3", "7 Hari");
        $sheet->setCellValue("K3", "Total");
        $sheet->setCellValue("L3", "kk");

        $row = 4;
        $index = 0;
        $num = 1;
        foreach ($jenis_pangan as $key_jenis => $value_jenis_pangan) {
            $sheet->setCellValue("B{$row}", $num .  ". " . $value_jenis_pangan['nama_jenis']);
            $row++;

            while ($pangan_list[$index]['id_jenis_pangan'] == $value_jenis_pangan['id_jenis_pangan'] && $index < 177) {
                $totalKonsumsi = PanganKeluargaModel::whereHas('keluarga', function ($query) use ($id, $th) {
                    $query->where('id_kecamatan', $id)
                        ->whereYear('created_date', $th);
                })->where('id_pangan', $pangan_list[$index]['id_pangan'])
                    ->sum('urt');

                $jumlah = $daysInYear > 0 ? $totalKonsumsi / $daysInYear : 0;

                $total = $kk > 0 ? ($jumlah / $kk) * 7 : 0;

                $sheet->setCellValue("B{$row}", $pangan_list[$index]['nama_pangan']);
                $sheet->setCellValue("C{$row}", $pangan_list[$index]['berat']);
                $sheet->setCellValue("D{$row}", $pangan_list[$index]['energi']);
                $sheet->setCellValue("E{$row}", $pangan_list[$index]['protein']);
                $sheet->setCellValue("F{$row}", $pangan_list[$index]['lemak']);
                $sheet->setCellValue("G{$row}", $pangan_list[$index]['karbohidrat']);
                $sheet->setCellValue("H{$row}", $pangan_list[$index]['referensi_urt']);
                $sheet->setCellValue("I{$row}", $jumlah);
                $sheet->setCellValue("J{$row}", 7);
                $sheet->setCellValue("K{$row}", $total);
                $sheet->setCellValue("L{$row}", $kk);

                $sheet->getColumnDimension('B')->setWidth(40);
                $sheet->getColumnDimension('C')->setAutoSize(true);
                $sheet->getColumnDimension('D')->setAutoSize(true);
                $sheet->getColumnDimension('E')->setAutoSize(true);
                $sheet->getColumnDimension('F')->setAutoSize(true);
                $sheet->getColumnDimension('G')->setAutoSize(true);
                $sheet->getColumnDimension('H')->setAutoSize(true);
                $sheet->getColumnDimension('I')->setAutoSize(true);
                $sheet->getColumnDimension('J')->setAutoSize(true);
                $sheet->getColumnDimension('K')->setAutoSize(true);
                $sheet->getColumnDimension('L')->setAutoSize(true);

                $columns = ['C', 'D', 'E', 'F', 'G', 'I', 'K'];
                foreach ($columns as $col)
                    if ($col === 'K') {
                                $sheet->getStyle("{$col}{$row}")
                                    ->getNumberFormat()
                                    ->setFormatCode('#,##0.000');
                            } else {
                                $sheet->getStyle("{$col}{$row}")
                                    ->getNumberFormat()
                                    ->setFormatCode('#,##0.00');
                            }
                $row++;
                $index++;
            }

            $ber = 1;
            foreach ($sub_jenis_pangan as $key_sub => $value_sub_jenis_pangan) {
                if ($value_jenis_pangan['id_jenis_pangan'] == $sub_jenis_pangan[$key_sub]['parent'] && $index < 177) {
                    $sheet->setCellValue("B{$row}", $num . "." . $ber . $value_sub_jenis_pangan['nama_jenis']);
                    $row++;
                    $ber++;

                    while ($pangan_list[$index]['id_jenis_pangan'] == $value_sub_jenis_pangan['id_jenis_pangan']) {
                        $totalKonsumsi = PanganKeluargaModel::whereHas('keluarga', function ($query) use ($id, $th) {
                            $query->where('id_kecamatan', $id)
                                ->whereYear('created_date', $th);
                        })->where('id_pangan', $pangan_list[$index]['id_pangan'])
                            ->sum('urt');

                        $jumlah = $daysInYear > 0 ? $totalKonsumsi / $daysInYear : 0;

                        $total = $kk > 0 ? ($jumlah / $kk) * 7 : 0;

                        $sheet->setCellValue("B{$row}", $pangan_list[$index]['nama_pangan']);
                        $sheet->setCellValue("C{$row}", $pangan_list[$index]['berat']);
                        $sheet->setCellValue("D{$row}", $pangan_list[$index]['energi']);
                        $sheet->setCellValue("E{$row}", $pangan_list[$index]['protein']);
                        $sheet->setCellValue("F{$row}", $pangan_list[$index]['lemak']);
                        $sheet->setCellValue("G{$row}", $pangan_list[$index]['karbohidrat']);
                        $sheet->setCellValue("H{$row}", $pangan_list[$index]['referensi_urt']);
                        $sheet->setCellValue("I{$row}", $jumlah);
                        $sheet->setCellValue("J{$row}", 7);
                        $sheet->setCellValue("K{$row}", $total);
                        $sheet->setCellValue("L{$row}", $kk);

                        $sheet->getColumnDimension('B')->setWidth(40);
                        $sheet->getColumnDimension('C')->setAutoSize(true);
                        $sheet->getColumnDimension('D')->setAutoSize(true);
                        $sheet->getColumnDimension('E')->setAutoSize(true);
                        $sheet->getColumnDimension('F')->setAutoSize(true);
                        $sheet->getColumnDimension('G')->setAutoSize(true);
                        $sheet->getColumnDimension('H')->setAutoSize(true);
                        $sheet->getColumnDimension('I')->setAutoSize(true);
                        $sheet->getColumnDimension('J')->setAutoSize(true);
                        $sheet->getColumnDimension('K')->setAutoSize(true);
                        $sheet->getColumnDimension('L')->setAutoSize(true);

                        $columns = ['C', 'D', 'E', 'F', 'G', 'I', 'K'];
                        foreach ($columns as $col) {
                            if ($col === 'K') {
                                $sheet->getStyle("{$col}{$row}")
                                    ->getNumberFormat()
                                    ->setFormatCode('#,##0.000');
                            } else {
                                $sheet->getStyle("{$col}{$row}")
                                    ->getNumberFormat()
                                    ->setFormatCode('#,##0.00');
                            }
                        }
                        $row++;
                        $index++;
                    }
                }
            }
            $num++;
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . 'Data_Rekap_' . $kecamatan->nama_kecamatan . '_' . date('Y-m-d_H-i-s') . '.xlsx' . '"');
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
