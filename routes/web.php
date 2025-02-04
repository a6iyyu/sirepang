<?php

use App\Http\Controllers\Authentication;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DesaController;
use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/masuk', [Authentication::class, 'show'])->name('masuk');
    Route::post('/masuk', [Authentication::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get(
        '/',
        [Dashboard::class, 'show']
    )->name('dasbor');

    /**
     * Coba indexing desa-desa
     */
    Route::get(
        '/desa',
        [DesaController::class, 'collect']
    );

    Route::get('/desa/create', );

    Route::get(
        '/desa/{id}',
        [DesaController::class, 'show']
    );

});

// ntar ganti ke post kalau udah ada formnya
Route::get('/keluar', [Authentication::class, 'logout'])->name('logout');
