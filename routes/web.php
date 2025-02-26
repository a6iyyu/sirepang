<?php

use App\Http\Controllers\Autentikasi;
use App\Http\Controllers\Dasbor;
use App\Http\Controllers\Keluarga;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/masuk', fn() => view('pages.auth.masuk'))->name('masuk');
    Route::post('/masuk', [Autentikasi::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return match (Auth::user()->tipe) {
            'admin' => redirect()->route('admin'),
            'kader' => redirect()->route('penyuluh'),
            default => redirect()->route('keluar'),
        };
    })->name('beranda');

    Route::get('/dasbor', [Dasbor::class, 'show'])->name('penyuluh');

    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('/', [Dasbor::class, 'show'])->name('admin');
        Route::get('/data-kecamatan', fn() => view('pages.admin.data-kecamatan'))->name('data-kecamatan');
        Route::get('/rekap-pangan', fn() => view('pages.admin.rekap-pangan'))->name('rekap-pangan');
        Route::get('/rekap-pph', fn() => view('pages.admin.rekap-pph'))->name('rekap-pph');
    });

    Route::middleware('kader')->prefix('keluarga')->group(function () {
        Route::get('/', [Keluarga::class, 'index'])->name('keluarga');
        Route::get('/tambah-data', [Keluarga::class, 'show'])->name('tambah-data');
        Route::post('/tambah-data', [Keluarga::class, 'create'])->name('tambah-data-keluarga');
        Route::post('/detail', [Keluarga::class, 'detail'])->name('keluarga.detail');
        Route::put('/edit', [Keluarga::class, 'edit'])->name('keluarga.edit');
        Route::delete('/hapus/{id}', [Keluarga::class, 'delete'])->name('keluarga.hapus');
    });

    Route::get('/keluar', [Autentikasi::class, 'logout'])->name('keluar');
});