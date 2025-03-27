<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class Pph extends Controller
{
    public function index(): View
    {
        return view('pages.admin.rekap-pph');
    }
}