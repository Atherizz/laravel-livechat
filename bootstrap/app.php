<?php

use App\Http\Middleware\OnlineCheck;
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
        $middleware->appendToGroup('user.last_seen_at', [
            OnlineCheck::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
