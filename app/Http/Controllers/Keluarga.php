<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Desa as DesaModel;
use App\Models\JenisPangan as JenisPanganModel;
use App\Models\Keluarga as KeluargaModel;
use App\Models\Pangan as PanganModel;
use App\Models\PanganKeluarga as PanganKeluargaModel;
use App\Models\RentangUang as RentangUangModel;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
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
            Log::info($request->all());

            $validator = Validator::make($request->all(), [
                'nama_kepala_keluarga' => 'string|required|max:255',
                'nama_desa' => 'string|required|max:255',
                'alamat' => 'string|required|max:255',
                'jumlah_keluarga' => 'integer|required|min:1|max:3',
                'range_pendapatan' => 'string|required|max:255',
                'range_pengeluaran'  => 'string|required|max:255',
                'is_hamil' => 'in:1,0|required',
                'is_menyusui' => 'in:1,0|required',
                'is_balita' => 'in:1,0|required',
                'gambar' => 'image|mimes:jpeg,png,jpg|max:4096|required',
            ]);

            if ($validator->fails()) return response()->json(['error' => $validator->errors()], 400);

            $keluarga = KeluargaModel::create([
                'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
                'nama_desa' => $request->nama_desa,
                'alamat' => $request->alamat,
                'jumlah_keluarga' => $request->jumlah_keluarga,
                'range_pendapatan' => $request->range_pendapatan,
                'range_pengeluaran' => $request->range_pengeluaran,
                'is_hamil' => $request->is_hamil,
                'is_menyusui' => $request->is_menyusui,
                'is_balita' => $request->is_balita,
                'gambar' => base64_encode(file_get_contents($request->file('gambar')->getRealPath())),
            ]);

            $data_pangan = json_decode($request->pangan, true);

            foreach ($data_pangan as $pangan) {
                PanganKeluargaModel::create([
                    'id_keluarga' => $keluarga->id_keluarga,
                    'nama_pangan' => $pangan['nama_pangan'],
                    'nama_jenis' => $pangan['nama_jenis'],
                    'urt' => $pangan['urt'],
                ]);
            }

            return response()->json(['message' => 'Data berhasil disimpan!'], 200);
        } catch (Exception $exception) {
            Log::error('Terdapat kesalahan pada sistem!', ['error' => $exception->getMessage()]);
            return response()->json(['error' => 'Terjadi kesalahan pada sistem.'], 500);
        }
    }
}