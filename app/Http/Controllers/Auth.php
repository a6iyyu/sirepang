<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class Auth extends Controller {
    public function show(): View
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'login_username' => ['string', 'required', 'max:255'],
                'login_password' => ['string', 'required', 'max:255'],
            ]);
        } catch (Exception $exception) {
            Log::error("Terjadi kesalahan: ", ['error' => $exception->getMessage()]);
        }
    }
}