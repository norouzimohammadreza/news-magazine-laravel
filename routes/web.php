<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
Route::prefix('admin')->group(function () {
    Route::get('/' ,[AdminDashboardController::class,'index']);
        Route::resource('/category',CategoryController::class);
        Route::resource('/user',UserController::class);
        Route::resource('/setting',SettingController::class);
        Route::resource('/menu',MenuController::class);
        Route::get('user/{user}',[UserController::class,'isAdmin'])->name('user.is-admin');

});
