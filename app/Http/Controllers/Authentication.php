<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class Authentication extends Controller
{
    /**
     * Views
     */
    public function show(): View
    {
        return view('pages.masuk');
    }


    /**
     * Controllers
     */
    public function login(Request $request)
    {
        try {
            $request->validate([
                'login_username' => 'required|string|max:255',
                'login_password' => 'required|string|max:255',
            ]);

            $user = DB::table('login')
                ->where('login_username', $request->login_username)
                ->where('login_password', $request->login_password)
                ->first();

            if ($user) {
                Auth::loginUsingId($user->login_id, true);
                $request->session()->regenerate();
                return redirect()->route('dasbor')->with('success', 'Berhasil masuk ke akun Anda.');
            }

            Log::warning('Upaya masuk gagal dilakukan.', ['login_username' => $request->login_username]);
            return back()
                ->withErrors(['error' => 'Nama pengguna atau kata sandi salah.'])
                ->withInput($request->except('login_password'));
        } catch (ValidationException $validation) {
            return back()
                ->withErrors($validation->errors())
                ->withInput($request->except('login_password'));
        } catch (Exception $exception) {
            Log::error("Terjadi kesalahan: ", ['error' => $exception->getMessage()]);
            return back()
                ->withErrors(['error' => 'Terjadi kesalahan pada sistem.'])
                ->withInput($request->except('login_password'));
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}