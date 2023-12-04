<?php

use App\Http\Controllers\CategoryApiController;
use App\Http\Controllers\ProductApiController;
use Illuminate\Support\Facades\Route;


Route::apiResource('categories', CategoryApiController::class);
Route::apiResource("products", ProductApiController::class);
