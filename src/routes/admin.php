<?php

use App\Actions\Admin\Home\AdminHomeIndexAction;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->group(function () {
    Route::controller(AdminHomeIndexAction::class)->group(function() {
        Route::get('/', 'index')->name('index');
    });
});
