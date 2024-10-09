<?php


use App\Http\Controllers\API\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\CommentController;
use Illuminate\Http\Request;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('/admin/', AdminDashboardController::class);
Route::apiResource('/admin/users',UserController::class);
Route::apiResource('/admin/categories',CategoryController::class);
Route::apiResource('/admin/posts',PostController::class);
Route::apiResource('/admin/comments',CommentController::class);
