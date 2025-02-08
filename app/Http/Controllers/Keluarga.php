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


    /**
     * Controllers
     */
    public function create(Request $request) {}
}