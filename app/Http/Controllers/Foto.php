<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Foto extends Controller
{
    public function show()
    {
        return view('pages.foto');
    }
}
