<?php

use App\Http\Controllers\Autentikasi;
use App\Http\Controllers\Dasbor;
use App\Http\Controllers\Desa;
use App\Http\Controllers\Foto;
use App\Http\Controllers\Keluarga;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/masuk', [Autentikasi::class, 'show'])->name('masuk');
    Route::post('/masuk', [Autentikasi::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [Dasbor::class, 'show'])->name('dasbor');

    Route::prefix('keluarga')->group(function () {
        Route::get('/', [Keluarga::class, 'show'])->name('keluarga');
    });
    Route::prefix('foto')->group(function () {
        Route::get('/', [Foto::class, 'show'])->name('foto');
    });
});

Route::get('/keluar', [Autentikasi::class, 'logout'])->name('keluar');
