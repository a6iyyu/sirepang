<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exports\Keluarga;
use App\Models\Keluarga as KeluargaModel;
use App\Models\Kecamatan;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Pph extends Controller
{
    public function index(Request $request): RedirectResponse|View
    {
        try {
            $kecamatan = Kecamatan::pluck('nama_kecamatan', 'id_kecamatan')->toArray();
            $tahun = [];

            if ($request->filled('kecamatan')) {
                $tahun = KeluargaModel::selectRaw('YEAR(created_date) as tahun')
                    ->where('id_kecamatan', $request->kecamatan)
                    ->distinct()
                    ->orderBy('tahun', 'desc')
                    ->pluck('tahun');
            }

            return view('pages.admin.rekap-pph', compact('kecamatan', 'tahun'));
        } catch (Exception $exception) {
            report($exception);
            Log::error('Terjadi kesalahan saat mengambil data kecamatan karena kesalahan pada sistem: ' . $exception->getMessage());
            return redirect()->back()->withErrors(['errors' => 'Data tidak ditemukan!']);
        }
    }

    public function export(int|string $kecamatan): RedirectResponse
    {
        try {
            $pph = DB::select("
                SELECT * FROM v_rekap_1
                WHERE id_kecamatan = $kecamatan
            ");

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->setCellValue('A1', 'No');

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Data Rekap PPH ' . date('d-m-Y') . '.xlsx"');
            header('Cache-Control: max-age=0');
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
            header('Cache-Control: cache, must-revalidate');
            header('Pragma: public');

            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save('php://output');
            exit;
        } catch (ModelNotFoundException $exception) {
            report($exception);
            Log::warning('Data tidak ditemukan: ' . $exception->getMessage());
            return back()->withErrors(['errors' => 'Data tidak ditemukan!']);
        } catch (Exception $exception) {
            report($exception);
            Log::error('Terjadi kesalahan saat mengekspor data PPH ke dalam berkas Excel: ' . $exception->getMessage());
            return back()->withErrors(['errors' => 'Terjadi kesalahan saat mengekspor data PPH ke dalam berkas Excel.']);
        }
    }
}