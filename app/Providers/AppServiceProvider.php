<?php

namespace App\Providers;

use App\Http\Middleware\Admin;
use App\Http\Middleware\Kader;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register() {}

    public function boot(): void
    {
        Route::aliasMiddleware('admin', Admin::class);
        Route::aliasMiddleware('kader', Kader::class);

    }
}
