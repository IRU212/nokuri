<?php

namespace App\Providers;

use App\Enum\Prefecture;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View as ViewView;

class AppServiceProvider extends ServiceProvider
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
        View::composer('*', function (ViewView $view) {
            $view->with('Prefecture', Prefecture::class);
        });
    }
}
