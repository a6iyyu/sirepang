<?php

use App\Http\Controllers\Authentication;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/masuk', [Authentication::class, 'show'])->name('masuk');
    Route::post('/masuk', [Authentication::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [Dashboard::class, 'show'])->name('dasbor');
});

Route::get('/keluar', [Authentication::class, 'logout'])->name('logout');