<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Kader;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Surveyor extends Controller
{
    public function index(): RedirectResponse|View
    {
        try {
            $data = User::where('tipe', 'kader')->paginate(request()->input('per_page', 10));
            return view('pages.admin.kelola-surveyor', compact('data'));
        } catch (Exception $exception) {
            return redirect()->back()->withErrors(['errors' => 'Data tidak ditemukan!']);
        }
    }

    public function detail(Request $request, string $id)
    {
        try {
            $surveyor = Kader::where('id_kader', $id)->first();
            return view('pages.admin.detail-surveyor', compact('surveyor'));
        } catch (Exception $exception) {}
    }

    public function create()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}