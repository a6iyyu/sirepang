<?php

use App\Http\Controllers\Autentikasi;
use App\Http\Controllers\Dasbor;
use App\Http\Controllers\Kecamatan;
use App\Http\Controllers\Keluarga;
use App\Http\Controllers\Pangan;
use App\Http\Controllers\Pph;
use App\Http\Controllers\Verifikasi;
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
        Route::get('/data-kecamatan/{year}', [Dasbor::class, 'data_kecamatan'])->name('admin.get.kecamatan.data');
        Route::get('/', [Dasbor::class, 'show'])->name('admin');
        Route::get('/rekap-pangan', [Pangan::class, 'index'])->name('rekap-pangan');
        Route::get('/rekap-pangan/{id}', [Pangan::class, 'detail'])->name('detail-rekap-pangan');
        Route::get('/rekap-pph', [Pph::class, 'index'])->name('rekap-pph');
        Route::post('/rekap-pph/ekspor/{tahun}', [Pph::class, 'export'])->name('ekspor-pph');
        Route::delete('/rekap-pangan/{id}', [Pangan::class, 'delete'])->name('hapus-rekap-pangan');
        
        Route::prefix('data-kecamatan')->group(function () {
            Route::get('/', [Kecamatan::class, 'index'])->name('data-kecamatan');
            Route::get('/detail/{id}', [Kecamatan::class, 'detail'])->name('admin.detail');
            Route::get('/rekap-kecamatan/{id}', [Kecamatan::class, 'rekap_kecamatan'])->name('admin.rekap-kecamatan');
            Route::get('/rekap-kecamatan/tahun/{th}', [Kecamatan::class, 'export_rekap'])->name('export.rekap-kecamatan');
        });

        Route::prefix('verifikasi-data')->group(function () {
            Route::get('/', [Verifikasi::class, 'index'])->name('verifikasi-data');
            Route::get('/detail/{id}', [Verifikasi::class, 'detail'])->name('verifikasi.detail');
            Route::post('/{status}', [Verifikasi::class, 'verify'])->name('verifikasi.status');
        });
    });

    Route::middleware('kader')->prefix('dasbor')->group(function () {
        Route::get('/', [Dasbor::class, 'show'])->name('penyuluh');
        Route::get('/cari', [Dasbor::class, 'search'])->name('cari-kepala-keluarga');
    });

    Route::middleware('kader')->prefix('keluarga')->group(function (): void {
        Route::get('/{id?}', [Keluarga::class, 'index'])->name('keluarga')->where('id', '[0-9]+');
        Route::get('/cari', [Dasbor::class, 'search'])->name('cari-kepala-keluarga');
        Route::get('/detail/{id}', [Keluarga::class, 'detail'])->name('keluarga.detail');
        Route::get('/edit/{id}', [Keluarga::class, 'edit'])->name('keluarga.edit');
        Route::get('/tambah-data', [Keluarga::class, 'show'])->name('tambah-data');
        Route::post('/tambah-data', [Keluarga::class, 'create'])->name('keluarga.tambah');
        Route::match(['put', 'post'], '/edit/{id}', [Keluarga::class, 'update'])->name('keluarga.perbarui');
        Route::delete('/hapus/{id}', [Keluarga::class, 'delete'])->name('keluarga.hapus');
    });

    Route::get('/keluar', [Autentikasi::class, 'logout'])->name('keluar');
});
