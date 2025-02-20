<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Desa as DesaModel;
use App\Models\JenisPangan as JenisPanganModel;
use App\Models\Keluarga as KeluargaModel;
use App\Models\Pangan as PanganModel;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class Keluarga extends Controller
{
    /**
     * Views
     */
    public function show(): View
    {
        $kader = User::find(Auth::user()->id_user)->kader;
        $desa = DesaModel::where('id_kecamatan', $kader->kecamatan->id_kecamatan)
            ->pluck('nama_desa', 'id_desa')
            ->toArray();

        $jenis_pangan = JenisPanganModel::all()->pluck('nama_jenis', 'id_jenis_pangan')->toArray();
        $nama_pangan = PanganModel::all()->groupBy('id_jenis_pangan')->map(function ($items) {
            return $items->pluck('nama_pangan', 'id_pangan')->toArray();
        })->toArray();

        $range_pendapatan = KeluargaModel::all()->pluck('range_pendapatan', 'id_keluarga')->toArray();
        $range_pengeluaran = KeluargaModel::all()->pluck('range_pengeluaran', 'id_keluarga')->toArray();
        $takaran = PanganModel::all()->pluck('takaran', 'id_pangan')->toArray();

        return view('pages.tambah-data-keluarga', [
            'desa' => $desa,
            'jenis_pangan' => $jenis_pangan,
            'nama_pangan' => $nama_pangan,
            'range_pendapatan' => $range_pendapatan,
            'range_pengeluaran' => $range_pengeluaran,
            'takaran' => $takaran,
        ]);
    }


    /**
     * Controllers
     */
    public function create(Request $request)
    {
        try {
            $request->validate([]);
        } catch (Exception $exception) {
            Log::error('Terdapat kesalahan pada sistem!', ['error' => $exception->getMessage()]);
        }
    }
}