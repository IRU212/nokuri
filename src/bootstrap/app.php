<?php

use App\Http\Middleware\AccessMiddleware;
use App\Http\Middleware\EnsureGestOfUser;
use App\Http\Middleware\EnsureUserIsAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::domain('admin.' . env('APP_DOMAIN'))->group(base_path('routes/admin.php'));
            Route::group(base_path('routes/user.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->use([
            AccessMiddleware::class,
        ]);
        $middleware->group('user', [
            \Illuminate\Cookie\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ]);
        $middleware->group('api', [
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ]);
        $middleware->alias([
            'Excel'                             => Maatwebsite\Excel\Facades\Excel::class,
            'ensure_user_is_authenticated'      => EnsureUserIsAuthenticated::class,
            'ensure_gest_of_user'               => EnsureGestOfUser::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
