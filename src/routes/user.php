<?php

use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\InquiryController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\User\PasswordResetController;
use App\Http\Controllers\User\RecommendationController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\SettingController;
use App\Http\Controllers\User\SocialiteLoginController;
use App\Http\Controllers\User\WikiController;
use Illuminate\Support\Facades\Route;

Route::middleware('user')->name('user.')->group(function () {
    Route::prefix('/auth/google')->controller(SocialiteLoginController::class)->name('socialite.auth.')->group(function () {
        Route::get('/redirect', 'redirect')->name('redirect');
        Route::get('/callback', 'callback')->name('callback');
    });
    Route::prefix('/login')->controller(LoginController::class)->name('login.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'auth')->name('auth');
    });
    Route::prefix('/register')->controller(RegisterController::class)->name('register.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/pre_store', 'preStore')->name('pre_store');
        Route::get('/pre_complete', 'preComplete')->name('pre_complete');
        Route::get('/store/{token}', 'store')->name('store');
    });
    Route::prefix('/password_reset')->controller(PasswordResetController::class)->name('password_reset.')->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/pre_store', 'preStore')->name('pre_store');
        Route::get('/pre_complete', 'preComplete')->name('pre_complete');
        Route::get('/store/{token}', 'store')->name('store');
    });
    Route::prefix('/')->controller(HomeController::class)->name('home.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    Route::prefix('/recommendation')->controller(RecommendationController::class)->name('recommendation.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    Route::prefix('/wiki')->controller(WikiController::class)->name('wiki.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    Route::prefix('/inquiry')->controller(InquiryController::class)->name('inquiry.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/complete', 'complete')->name('complete');
    });
    Route::prefix('/setting')->controller(SettingController::class)->name('setting.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/update', 'update')->name('update');
    });
    Route::prefix('/logout')->controller(LogoutController::class)->name('logout.')->group(function () {
        Route::post('/', 'store')->name('store');
    });
});