<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesaController extends Controller
{
    function collect()
    {

        /**
         * dapatkan kecamatan dari seorang penyuluh
         * nanti ganti pake data dari user
         */
        // $kecamatan = Kecamatan::where('kec_nama', 'Dau')->first();
        $kecamatan = Auth::user()->kader->kecamatan;

        $desa = Desa::where('desa_kec_id', $kecamatan['kec_id'])->simplePaginate(20);
        return view('pages.desa.index', [
            'kecamatan' => $kecamatan,
            'desa' => $desa
        ]);
    }
    function show($id)
    {
        $desa = Desa::find($id);
        return view('pages.desa.show', ['desa' => $desa]);
    }

    function create()
    {
        return view('pages.desa.create');
    }
}
