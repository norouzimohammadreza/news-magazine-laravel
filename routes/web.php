<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\Admin\SettingController;
use \App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Auth;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('category/{category}',[HomeController::class,'category'])->name('category');

Route::middleware(Auth::class)->group(function (){
    Route::get('register',[AuthController::class,'register'])->name('register');
    Route::post('register/store',[AuthController::class,'registerStore'])->name('register.store');
    Route::get('login',[AuthController::class,'login'])->name('login');
    Route::post('login/store',[AuthController::class,'loginStore'])->name('login.store');
    Route::get('sendMail/{token}/{email}',[AuthController::class,'sendMail'])->name('sendMail');
    Route::get('verify-account/{token}/',[AuthController::class,'verifyAccount'])->name('verifyAccount');
    Route::get('reset-password/',[AuthController::class,'resetPassword'])->name('resetPassword');
    Route::Post('forgot-password/',[AuthController::class,'forgotPassword'])->name('forgotPassword');
    Route::get('send-password/{token}/{email}', [AuthController::class, 'sendForgotPassword'])->name('sendForgotPassword');});
    Route::get('new-password/{token}',[AuthController::class,'newPassword'])->name('newPassword');
    Route::Post('confirm-password/{token}',[AuthController::class,'confirmPassword'])->name('confirmPassword');

Route::get('check',function (){
    dd(auth()->user());
});

Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::prefix('admin')->group(function () {
    Route::get('/' ,[AdminDashboardController::class,'index']);
        Route::resource('/category',CategoryController::class);
        Route::resource('/user',UserController::class);
        Route::resource('/setting',SettingController::class);
        Route::resource('/menu',MenuController::class);
        Route::get('user/{user}',[UserController::class,'isAdmin'])->name('user.is-admin');
        Route::resource('/post',PostController::class);
        Route::get('post/selected/{post}', [PostController::class, 'isSelected'])->name('user.is-selected');
        Route::get('post/breaking-news/{post}',[PostController::class,'breakingNews'])->name('user.breaking-news');
        Route::resource('/comment', CommentController::class);
        Route::get('comment/change-status/{comment}',[CommentController::class,'change'])->name('comment.status');
        Route::resource('/banner', BannerController::class);
});
