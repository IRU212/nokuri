<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->group(function () {
    // 通常
    Route::prefix('/')->name('home.')->controller(HomeController::class)->group(function() {
        Route::get('/', 'index')->name('index');
    });
    Route::prefix('/user')->name('user.')->controller(UserController::class)->group(function() {
        Route::get('/', 'index')->name('index');
    });
    // マスタデータ
    // アカウント
});
