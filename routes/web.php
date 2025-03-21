<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\RedirectIfAuth;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;


    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('category/{category}', [HomeController::class, 'category'])->name('category');
    Route::get('about/', [HomeController::class, 'about'])->name('about');
    Route::get('contact/', [HomeController::class, 'contact'])->name('contact');
    Route::get('post/{post}', [HomeController::class, 'post'])->name('post');
    Route::post('comment/{post}', [HomeController::class, 'comment'])->name('comment');

    //Route::get('lang/{lang}', [HomeController::class, 'changeLang'])->name('change-lang');

    Route::middleware(RedirectIfAuth::class)->group(function () {
        Route::get('register', [AuthController::class, 'register'])->name('register');
        Route::post('register/store', [AuthController::class, 'registerStore'])->name('register.store');
        Route::get('login', [AuthController::class, 'login'])->name('login');
        Route::get('login2', [AuthController::class, 'login2'])->name('login2');
        Route::post('login/store', [AuthController::class, 'loginStore'])->name('login.store');
        Route::get('verify-account/{token}/', [AuthController::class, 'verifyAccount'])->name('verifyAccount');
        Route::get('reset-password/', [AuthController::class, 'resetPassword'])->name('resetPassword');
        Route::Post('forgot-password/', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
        Route::get('new-password/{token}', [AuthController::class, 'newPassword'])->name('newPassword');
        Route::Post('confirm-password/{token}', [AuthController::class, 'confirmPassword'])->name('confirmPassword');
    });

    if(App::isLocal()) {
        Route::prefix('test')->group(function () {
            Route::get('lang', [TestController::class, 'lang'])->name('lang');
            Route::get('check', [TestController::class, 'check'])->name('check');
        });
    }

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('admin')->middleware(IsAdmin::class)->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('/category', CategoryController::class);
        Route::resource('/user', UserController::class);
        Route::resource('/setting', SettingController::class);
        Route::resource('/menu', MenuController::class);
        Route::get('user/admin/{user}', [UserController::class, 'isAdmin'])->name('user.is-admin');
        Route::resource('/post', PostController::class);
        Route::get('post/selected/{post}', [PostController::class, 'isSelected'])->name('user.is-selected');
        Route::get('post/breaking-news/{post}', [PostController::class, 'breakingNews'])->name('user.breaking-news');
        Route::resource('/comment', CommentController::class);
        Route::get('comment/change-status/{comment}', [CommentController::class, 'change'])->name('comment.status');
        Route::resource('/banner', BannerController::class);
});
