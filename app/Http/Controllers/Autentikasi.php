<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Autentikasi extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'username' => 'required|string|max:255',
                'password' => 'required|string|max:255',
            ], [
                'username.required' => 'Harap isikan nama Anda!',
                'password.required' => 'Isi kata sandi terlebih dahulu!',
            ]);

            $user = DB::table('users')->where('username', $request->username)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                Auth::loginUsingId($user->id_user, true);
                $request->session()->regenerate();
            }

            return back()->withErrors(['error' => 'Nama pengguna atau kata sandi salah.'])->withInput($request->except('password'));
        } catch (ValidationException $validation) {
            return back()->withErrors($validation->errors())->withInput($request->except('password'));
        } catch (Exception $exception) {
            report($exception);
            return back()->withErrors(['error' => 'Terjadi kesalahan pada sistem.'])->withInput($request->except('password'));
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}