<?php


use App\Http\Controllers\API\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\CommentController;
use Illuminate\Http\Request;
use App\Http\Controllers\API\AuthController;
use App\Http\Middleware\Auth;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\API\AppController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('logout',[AuthController::class,'logout']);
Route::get('/',[AppController::class,'index']);
Route::get('/category/{category}',[AppController::class,'category']);
Route::get('/post/{post}',[AppController::class,'post']);
Route::post('comment/{post}',[AppController::class,'comment'])->middleware('auth:sanctum');

Route::middleware([Auth::class])->group(function (){
    Route::post('register',[AuthController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
    Route::get('verify-account/{token}/',[AuthController::class,'verifyAccount']);
    Route::Post('forgot-password/',[AuthController::class,'forgotPassword']);
    Route::Post('confirm-password/{token}',[AuthController::class,'confirmPassword']);
});

Route::middleware(['auth:sanctum',IsAdmin::class])->prefix('admin')->group(function () {
    Route::apiResource('/', AdminDashboardController::class);
    Route::apiResource('/users',UserController::class);
    Route::apiResource('/banners',\App\Http\Controllers\API\BannerController::class);
    Route::apiResource('/menus',\App\Http\Controllers\API\MenuController::class);
    Route::resource('/setting',\App\Http\Controllers\API\SettingController::class);
    Route::get('/users/admin/{user}',[UserController::class,'isAdmin']);
    Route::apiResource('/categories',CategoryController::class);
    Route::apiResource('/posts',PostController::class);
    Route::get('posts/selected/{post}',[PostController::class,'isSelected']);
    Route::get('post/breaking-news/{post}',[PostController::class,'breakingNews']);
    Route::apiResource('/comments',CommentController::class);
    Route::get('comments/change-status/{comment}',[CommentController::class,'change']);
});
