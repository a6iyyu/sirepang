<?php

use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [Auth::class, 'show'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [])->name('');
});