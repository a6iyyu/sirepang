<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class Dashboard extends Controller
{
    /**
     * Views
     */
    public function show(): View
    {
        return view('pages.dasbor', ['jumlahDesa' => $this->getJumlahDesa(), 'jumlahKeluarga' => $this->getJumlahKeluarga()]);
    }

    private function getJumlahDesa()
    {
        $kader = Auth::user()->kader;
        return $kader->kecamatan->desa->count();
    }

    private function getJumlahKeluarga()
    {
        $kader = Auth::user()->kader;
        return $kader->kecamatan->keluarga->count();
    }
}
