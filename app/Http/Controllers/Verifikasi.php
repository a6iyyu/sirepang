<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Keluarga as KeluargaModel;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class Verifikasi extends Controller
{
    public function index()
    {
        try {
            // $kader = Auth::user()->kader->id_kader;
            // $data = KeluargaModel::where('id_kader', $kader)->paginate(request()->input('per_page', default: 10));
            $data = KeluargaModel::paginate(request()->input('per_page', default: 10));
            $data->through(fn($item) => (object) [
                'id'   => $item->id_keluarga,
                'nama' => $item->nama_kepala_keluarga,
                'desa' => $item->desa->nama_desa . ' - ' . $item->desa->kode_wilayah,
                'kader' => $item->kader->nama
            ]);

            return view('pages.admin.verifikasi-data', [
                'data' => $data,
                'keluarga' => isset($id) ? KeluargaModel::with('desa')->findOrFail($id) : null,
            ]);
        } catch (Exception $exception) {
            Log::error('Terjadi kesalahan saat mengambil data: ' . $exception->getMessage());
            return back()->withErrors(['errors' => 'Data tidak ditemukan!']);
        }
    }
    public function approve() {}

    public function detail($id_keluarga) {
        
    }

    public function reject() {}
}
