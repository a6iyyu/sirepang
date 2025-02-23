<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class Autentikasi extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|string|max:255',
                'password' => 'required|string|max:255',
            ], [
                'username.required' => 'Harap mengisikan nama daerah Anda!',
                'password.required' => 'Isi kata sandi terlebih dahulu!',
            ]);

            $user = DB::table('users')
                ->where('username', $request->username)
                ->where('password', $request->password)
                ->first();

            if ($user) {
                Auth::loginUsingId($user->id_user, true);
                $request->session()->regenerate();
            }

            Log::warning('Upaya masuk gagal dilakukan.', ['username' => $request->username]);
            return back()
                ->withErrors(['error' => 'Nama pengguna atau kata sandi salah.'])
                ->withInput($request->except('password'));
        } catch (ValidationException $validation) {
            return back()
                ->withErrors($validation->errors())
                ->withInput($request->except('password'));
        } catch (Exception $exception) {
            Log::error("Terjadi kesalahan: ", ['error' => $exception->getMessage()]);
            return back()
                ->withErrors(['error' => 'Terjadi kesalahan pada sistem.'])
                ->withInput($request->except('password'));
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