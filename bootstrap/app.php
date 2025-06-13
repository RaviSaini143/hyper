<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Ensure session middleware is included
        /* $middleware->use([
            \Illuminate\Session\Middleware\StartSession::class,
        ]); */

        // Register middleware aliases
        $middleware->alias([
            'guest.add_user' => \App\Http\Middleware\RedirectIfAuthenticatedAddUser::class,
            'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'set.locale' => \App\Http\Middleware\SetLocale::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();