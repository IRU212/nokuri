<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\User\InquiryController;
use App\Http\Controllers\User\LoginController as UserLoginController;
use App\Http\Controllers\User\LogoutController as UserLogoutController;
use App\Http\Controllers\User\RecommendationController;
use App\Http\Controllers\User\RegisterController as UserRegisterController;
use App\Http\Controllers\User\SettingController as UserSettingController;
use App\Http\Controllers\User\SocialiteLoginController;
use App\Http\Controllers\User\WikiController;
use Illuminate\Support\Facades\Route;

// ユーザ
Route::name('user.')->group(function () {
    // ソーシャルログイン
    Route::prefix('/auth/google')->controller(SocialiteLoginController::class)->name('socialite.auth.')->group(function () {
        Route::get('/redirect', 'redirect')->name('redirect');
        Route::get('/callback', 'callback')->name('callback');
    });
    // ログイン
    Route::prefix('/login')->controller(UserLoginController::class)->name('login.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'auth')->name('auth');
    });
    // 新規登録
    Route::prefix('/register')->controller(UserRegisterController::class)->name('register.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    // ホーム
    Route::prefix('/')->controller(UserHomeController::class)->name('home.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    // おすすめ
    Route::prefix('/recommendation')->controller(RecommendationController::class)->name('recommendation.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    // Wiki
    Route::prefix('/wiki')->controller(WikiController::class)->name('wiki.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    // お問い合わせ
    Route::prefix('/inquiry')->controller(InquiryController::class)->name('inquiry.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/complete', 'complete')->name('complete');
    });
    Route::middleware(['user'])->group(function () {
        // 設定
        Route::prefix('/setting')->controller(UserSettingController::class)->name('setting.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/update', 'update')->name('update');
        });
        // ログアウト
        Route::prefix('/logout')->controller(UserLogoutController::class)->name('logout.')->group(function () {
            Route::post('/', 'logout')->name('logout');
        });
    });
});
// 管理画面
Route::prefix('/admin')->name('admin.')->group(function () {
    Route::middleware(['gest'])->group(function () {
        // ログイン
        Route::prefix('/login')->controller(LoginController::class)->name('login.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'auth')->name('auth');
        });
    });
    Route::middleware(['admin'])->group(function () {
        // ログアウト
        Route::prefix('/logout')->controller(LogoutController::class)->name('logout.')->group(function () {
            Route::post('/', 'clearAuth')->name('clearAuth');
        });
        // ホーム
        Route::prefix('/')->controller(AdminHomeController::class)->name('home.')->group(function () {
            Route::get('/', 'index')->name('index');
        });
        // コンテンツ
        Route::prefix('/content')->group(function () {
            Route::prefix('/')->controller(ContentController::class)->name('content.')->group(function () {
                Route::get('/', 'index')->name('index');
            });
            // ユーザ
            Route::prefix('/user')->controller(UserController::class)->name('user.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::get('/{user_id}', 'edit')->name('edit');
            });
            // 管理者ユーザ
            Route::prefix('/admin_user')->controller(AdminUserController::class)->name('admin_user.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::get('/{admin_user_id}', 'edit')->name('edit');
            });
            // お知らせ
            Route::prefix('/news')->controller(NewsController::class)->name('news.')->group(function () {
                Route::get('/', 'index')->name('index');
            });
        });
        // 設定
        Route::prefix('/setting')->controller(SettingController::class)->name('setting.')->group(function () {
            Route::get('/', 'index')->name('index');
        });
    });
});
