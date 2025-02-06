<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Keluarga extends Controller
{
    /**
     * Views
     */
    public function show(): View
    {
        return view('pages.keluarga');
    }

    public function form(): View
    {
        return view('pages.tambah-keluarga');
    }

    /**
     * Controllers
     */
    public function create()
    {

    }
}