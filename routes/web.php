<?php

use App\Http\Controllers\Autentikasi;
use App\Http\Controllers\Dasbor;
use App\Http\Controllers\Keluarga;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/masuk', fn() => view('pages.auth.masuk'))->name('masuk');
    Route::post('/masuk', [Autentikasi::class, 'login'])->name('login');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', fn() => view('pages.admin.dasbor'))->name('admin');
    Route::get('/data-kecamatan', fn() => view('pages.admin.data-kecamatan'))->name('data-kecamatan');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [Dasbor::class, 'show'])->name('dasbor');

    Route::prefix('keluarga')->group(function () {
        Route::get('/', fn() => view('pages.surveyor.keluarga'))->name('keluarga');
        Route::get('/tambah-data', [Keluarga::class, 'show']);
        Route::post('/tambah-data', [Keluarga::class, 'create'])->name('tambah-data-keluarga');
    });
});

Route::get('/keluar', [Autentikasi::class, 'logout'])->name('keluar');
