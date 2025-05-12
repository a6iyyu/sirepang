<?php

declare(strict_types=1);

use App\Http\Middleware\Admin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(fn(Middleware $middleware): Middleware => $middleware->alias(['admin' => Admin::class]))
    ->withExceptions(fn(Exceptions $exceptions): Exceptions => $exceptions)->create();