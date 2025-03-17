<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Autentikasi;
use App\Http\Controllers\Dasbor;
use App\Http\Controllers\Keluarga;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (): void {
    Route::get('/masuk', fn() => view('pages.auth.masuk'))->name('masuk');
    Route::post('/masuk', [Autentikasi::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', fn(): RedirectResponse => match (Auth::user()->tipe) {
        'admin' => redirect()->route('admin'),
        'kader' => redirect()->route('penyuluh'),
        default => redirect()->route('keluar'),
    });

    Route::middleware('admin')->prefix('admin')->group(function (): void {
        Route::get('/', [Dasbor::class, 'show'])->name('admin');
        Route::get('/data-kecamatan', [Admin::class, 'index'])->name('data-kecamatan');
        Route::get('/detail/{id}', [Admin::class, 'detail'])->name('admin.detail');
        Route::get('/edit/{id}', [Admin::class, 'edit'])->name('admin.edit');
        Route::get('/rekap-pangan', [Admin::class, 'foods'])->name('rekap-pangan');
        Route::get('/rekap-pph', [Admin::class, 'pph'])->name('rekap-pph');
        Route::put('/edit/{id}', [Admin::class, 'update'])->name('admin.perbarui');
        Route::delete('/hapus/{id}', [Admin::class, 'delete'])->name('admin.hapus');
    });

    Route::middleware('kader')->prefix('dasbor')->group(function () {
        Route::get('/', [Dasbor::class, 'show'])->name('penyuluh');
        Route::get('/cari', [Dasbor::class, 'search'])->name('cari-kepala-keluarga');
    });

    Route::middleware('kader')->prefix('keluarga')->group(function (): void {
        Route::get('/{id?}', [Keluarga::class, 'index'])->name('keluarga')->where('id', '[0-9]+');
        Route::get('/cari', [Dasbor::class, 'search'])->name('cari-kepala-keluarga');
        Route::get('/detail/{id}', [Keluarga::class, 'detail'])->name('keluarga.detail');
        Route::get('/tambah-data', [Keluarga::class, 'show'])->name('tambah-data');
        Route::post('/tambah-data', [Keluarga::class, 'create'])->name('keluarga.tambah');
        Route::delete('/hapus/{id}', [Keluarga::class, 'delete'])->name('keluarga.hapus');
    });

    Route::get('/keluar', [Autentikasi::class, 'logout'])->name('keluar');
});