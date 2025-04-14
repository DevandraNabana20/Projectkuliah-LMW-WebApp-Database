<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Register middleware aliases
        $middleware->alias([
            // Middleware lainnya yang sudah ada...
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'auth.admin' => \App\Http\Middleware\RedirectIfNotAdmin::class,
        ]);

        // Configure authentication redirects
        $middleware->redirectGuestsTo(fn() => route('admin.login'));
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
