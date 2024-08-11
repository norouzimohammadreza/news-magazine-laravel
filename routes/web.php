<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\Admin\SettingController;
use \App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CommentController;

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

});
