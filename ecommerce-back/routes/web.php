<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


// Admin
Route::group(["prefix" => "admin"], function () {
    // for admin main page
    Route::get("/", [AdminController::class, "home"])->name("admin.home");
    // for categories CRUD
    Route::resource("/categories", CategoryController::class);
});
