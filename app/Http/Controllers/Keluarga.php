<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Desa as DesaModel;
use App\Models\DetailPanganKeluarga;
use App\Models\JenisPangan as JenisPanganModel;
use App\Models\Keluarga as KeluargaModel;
use App\Models\Pangan as PanganModel;
use App\Models\RentangUang;
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
        // $kader = User::find(Auth::user()->id_user)->kader;
        // $desa = DesaModel::where('id_kecamatan', $kader->kecamatan->id_kecamatan)
        //     ->pluck('nama_desa', 'id_desa')
        //     ->toArray();

        // $jenis_pangan = JenisPanganModel::all()->pluck('nama_jenis', 'id_jenis_pangan')->toArray();
        // $nama_pangan = PanganModel::all()->groupBy('id_jenis_pangan')->map(function ($items) {
        //     return $items->pluck('nama_pangan', 'id_pangan')->toArray();
        // })->toArray();

        // $batas_bawah = RentangUang::all()->pluck('batas_bawah', 'id_rentang_uang')->toArray();
        // $batas_atas = RentangUang::all()->pluck('batas_atas', 'id_rentang_uang')->toArray();

        // $rentang_uang = [];
        // foreach ($batas_bawah as $id => $bawah) {
        //     $atas = $batas_atas[$id] ?? null;
        //     $rentang_uang[$id] = "$bawah - $atas";
        // }

        // $takaran = PanganModel::all()->pluck('takaran', 'id_pangan')->toArray();

        // return view('pages.surveyor.tambah-data-keluarga', [
        //     'rentang_uang' => $rentang_uang,
        //     'desa' => $desa,
        //     'jenis_pangan' => $jenis_pangan,
        //     'nama_pangan' => $nama_pangan,
        //     'takaran' => $takaran,
        // ]);
        return view('testing.test');
    }


    /**
     * Controllers
     */
    public function create(Request $request)
    {

        $data = $request->json()->all();
        // dd($request);
        // dd($data);

        // Validator::make($data, [
        //     'nama_kepala_keluarga' => 'string|required|max:255',
        //     'nama_desa' => 'string|required|max:255',
        //     'alamat' => 'string|required|max:255',
        //     'jumlah_keluarga' => 'integer|required|min:1|max:3',
        //     'range_pendapatan' => 'string|required|max:255',
        //     'range_pengeluaran'  => 'string|required|max:255',
        //     'is_hamil' => 'in:1,0|required',
        //     'is_menyusui' => 'in:1,0|required',
        //     'is_balita' => 'in:1,0|required',
        //     'gambar' => 'image|mimes:jpeg,png,jpg|max:4096|required',
        //     'nama_jenis' => 'required|exists:jenis_pangan,nama_jenis',
        //     'nama_pangan' => 'required|exists:pangan,nama_pangan',
        //     'urt' => 'integer|required|min:1|max:4',
        // ])->validate();

        // if ($request->hasFile('gambar')) {
        //     $image_data = base64_encode(file_get_contents($request->file('gambar')->getRealPath()));
        // } else {
        //     return response()->json(['error' => 'Gambar tidak ditemukan!'], 400);
        // }

        /**
         * gini bisa
         */
        $keluarga = new KeluargaModel();
        $keluarga->nama_kepala_keluarga = $request['nama_kepala_keluarga'];
        $keluarga->id_desa = $request['id_desa'];
        $keluarga->alamat = $request['alamat'];
        $keluarga->jumlah_keluarga = $request['jumlah_keluarga'];
        $keluarga->rentang_pendapatan = $request['rentang_pendapatan'];
        $keluarga->rentang_pengeluaran = $request['rentang_pengeluaran'];
        $keluarga->is_hamil = $request['is_hamil'];
        $keluarga->is_menyusui = $request['is_menyusui'];
        $keluarga->is_balita = $request['is_balita'];
        $keluarga->id_kader = Auth::user()->id_kader;
        $keluarga->id_desa = $request['id_desa'];
        $keluarga->id_kecamatan = $request['id_kecamatan'];
        $keluarga->gambar = $request['gambar'];
        $keluarga->save();

        /**
         * atau gini
         */
        // $keluarga = KeluargaModel::create($request->except('detail_pangan_keluarga'));
        // tapi masih belum bisa karena perlu gambar

        foreach ($request->detail_pangan_keluarga as $detail) {
            if (!isset($detail['id_pangan'])) {
                dd('id_pangan tidak ada', $detail);
            }
            DetailPanganKeluarga::create([
                'id_pangan' => $detail['id_pangan'],
                'jumlah_urt' => $detail['jumlah_urt'],
                'id_keluarga' => $detail['id_keluarga'],
            ]);
        }


        if ($request->has('detail_pangan')) {
            $keluarga->detailPanganKeluarga()->createMany($request->detail_pangan);
        }
        redirect()->route('testing');
        // return response()->json(['message' => 'Data berhasil disimpan!'], 200);
    }
}
