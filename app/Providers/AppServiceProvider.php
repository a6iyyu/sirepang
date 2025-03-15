<?php

namespace App\Providers;

use App\Http\Middleware\Admin;
use App\Http\Middleware\Kader;
use App\Http\Middleware\RemovePageOne;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register() {}

    public function boot(Kernel $kernel): void
    {
        $kernel->pushMiddleware(RemovePageOne::class);
        Paginator::defaultView('shared.navigation.pagination');
        Route::aliasMiddleware('admin', Admin::class);
        Route::aliasMiddleware('kader', Kader::class);
    }
}