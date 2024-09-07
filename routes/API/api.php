<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
Route::apiResource('/users',UserController::class);
Route::apiResource('/categories',\App\Http\Controllers\API\CategoryController::class);
