<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Mrj\Foundation\Foundation;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(Foundation::middleware(function (Middleware $middleware): void {
        //
    }))
    ->withExceptions(Foundation::exceptions(function (Exceptions $exceptions): void {
        //
    }))
    ->withSingletons(Foundation::singletons())
    ->create();
