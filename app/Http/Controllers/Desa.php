<?php

namespace App\Http\Controllers;

use App\Models\Desa as DesaController;
use App\Models\Kecamatan as KecamatanModel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Desa extends Controller
{
    /**
     * Views
     */
    public function show(): View
    {
        return view('pages.desa');
    }

    public function form(): View
    {
        return view('pages.tambah-desa');
    }

    /**
     * Controllers
     */
    public function create()
    {

    }
}