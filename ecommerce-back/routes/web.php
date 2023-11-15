<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


// Admin
Route::group(["prefix" => "admin"], function () {
    Route::get("/", [AdminController::class, "home"])->name("admin.home");
    Route::resource("/categories", CategoryController::class);
});
