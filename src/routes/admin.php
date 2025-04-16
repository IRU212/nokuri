<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->group(function () {
    Route::controller(HomeController::class)->group(function() {
        Route::get('/', 'index')->name('index');
    });
});
