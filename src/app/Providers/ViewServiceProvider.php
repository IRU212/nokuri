<?php

namespace App\Providers;

use App\View\Composers\CommonComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

final class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', CommonComposer::class);
    }
}
