<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::middleware(['gest'])->group(function () {
        Route::prefix('/login')->controller(LoginController::class)->name('login.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'auth')->name('auth');
        });
    });
    Route::middleware(['admin'])->group(function () {
        Route::prefix('/logout')->controller(LogoutController::class)->name('logout.')->group(function () {
            Route::post('/', 'clearAuth')->name('clearAuth');
        });
        Route::prefix('/')->controller(HomeController::class)->name('home.')->group(function () {
            Route::get('/', 'index')->name('index');
        });
        Route::prefix('/content')->group(function () {
            Route::prefix('/')->controller(ContentController::class)->name('content.')->group(function () {
                Route::get('/', 'index')->name('index');
            });
            Route::prefix('/user')->controller(UserController::class)->name('user.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::get('/{user_id}', 'edit')->name('edit');
            });
            Route::prefix('/admin_user')->controller(AdminUserController::class)->name('admin_user.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::get('/{admin_user_id}', 'edit')->name('edit');
            });
            Route::prefix('/news')->controller(NewsController::class)->name('news.')->group(function () {
                Route::get('/', 'index')->name('index');
            });
        });
        Route::prefix('/setting')->controller(SettingController::class)->name('setting.')->group(function () {
            Route::get('/', 'index')->name('index');
        });
    });
});
