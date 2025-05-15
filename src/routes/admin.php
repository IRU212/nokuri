<?php

use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\PrefectureController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('admin')->name('admin.')->group(function () {
    // 未ログイン
    Route::middleware('ensure_gest_of_admin')->group(function() {
        // ゲスト
        Route::prefix('/login')->name('login.')->controller(LoginController::class)->group(function() {
            Route::get('/', 'index')->name('index');
            Route::post('/verify_email', 'verifyEmail')->name('verify_email');
            Route::get('/email_verification_code/{token}', 'verifyEmailCode')->name('verify_email_code');
            Route::post('/auth', 'auth')->name('auth');
        });
    });
    // ログイン
    Route::middleware('ensure_admin')->group(function() {
        // トランザクションデータ
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
        Route::prefix('/logout')->name('logout.')->controller(LogoutController::class)->group(function() {
            Route::get('/', 'clearAuth')->name('clear_auth');
        });
    });
});
