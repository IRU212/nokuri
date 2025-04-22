<?php

use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PrefectureController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->group(function () {
    // ゲスト
    // 通常
    Route::prefix('/')->name('home.')->controller(HomeController::class)->group(function() {
        Route::get('/', 'index')->name('index');
    });
    Route::prefix('/user')->name('user.')->controller(UserController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/{id}', 'edit')->name('edit');
    });
    // マスタデータ
    Route::prefix('/work_out')->name('work_out.')->controller()->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/{id}', 'edit')->name('edit');
    });
    Route::prefix('/prefecture')->name('prefecture.')->controller(PrefectureController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/{id}', 'edit')->name('edit');
    });
    Route::prefix('/admin_role')->name('admin_role.')->controller(AdminRoleController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
    // アカウント
});