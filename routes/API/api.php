<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\CommentController;

Route::apiResource('/users',UserController::class);
Route::apiResource('/categories',CategoryController::class);
Route::apiResource('/posts',PostController::class);
Route::apiResource('/comments',CommentController::class);
