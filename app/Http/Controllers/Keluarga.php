<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Desa as DesaModel;
use App\Models\DetailPanganKeluarga;
use App\Models\JenisPangan as JenisPanganModel;
use App\Models\Keluarga as KeluargaModel;
use App\Models\Pangan as PanganModel;
use App\Models\RentangUang as RentangUangModel;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        $batas_bawah = RentangUangModel::all()->pluck('batas_bawah', 'id_rentang_uang')->toArray();
        $batas_atas = RentangUangModel::all()->pluck('batas_atas', 'id_rentang_uang')->toArray();

        $rentang_uang = [];
        foreach ($batas_bawah as $id => $bawah) {
            $atas = $batas_atas[$id] ?? null;
            $rentang_uang[$id] = "$bawah - $atas";
        }

        $takaran = PanganModel::all()->pluck('takaran', 'id_pangan')->toArray();

        return view('pages.surveyor.tambah-data-keluarga', [
            'rentang_uang' => $rentang_uang,
            'desa' => $desa,
            'jenis_pangan' => $jenis_pangan,
            'nama_pangan' => $nama_pangan,
            'takaran' => $takaran,
        ]);
    }


    /**
     * Controllers
     */
    public function create(Request $request)
    {
        try {
            $request->validate([
                'nama_kepala_keluarga' => 'string|required|max:255',
                'id_desa' => 'string|required|max:255',
                'alamat' => 'string|required|max:255',
                'jumlah_keluarga' => 'integer|required|min:1|max:50',
                'range_pendapatan' => 'string|required|max:255',
                'range_pengeluaran' => 'string|required|max:255',
                'is_hamil' => 'in:1,0|required',
                'is_menyusui' => 'in:1,0|required',
                'is_balita' => 'in:1,0|required',
            ]);

            $data = $request->all();
            if ($request->hasFile('gambar')) $data['gambar'] = base64_encode(file_get_contents($request->file('gambar')));
    
            $data['id_kecamatan'] = Auth::user()->kader->kecamatan->id_kecamatan;
            $data['id_kader'] = Auth::user()->kader->id_kader;
            KeluargaModel::create($data);

            if ($request->ajax() || $request->wantsJson()) return response()->json(['redirect' => route('keluarga'), 'success' => 'Data keluarga berhasil disimpan!']);
            return redirect()->route('keluarga')->with('success', 'Data keluarga berhasil disimpan!');
        } catch (Exception $exception) {
            return back()->withErrors(['error' => $exception->getMessage()]);
        }
    }
}