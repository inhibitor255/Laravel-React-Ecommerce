<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

// Auth
Route::get("/admin/login", [AuthController::class, "showLogin"])->name("auth.showLogin");
Route::post("/admin/login", [AuthController::class, "postLogin"])->name("auth.postLogin");
Route::get("/admin/logout", [AuthController::class, "logout"])->name("auth.logout");

// Admin
Route::group(["prefix" => "admin", "middleware" => ["AdminAuth"]], function () {
    // for admin main page
    Route::get("/", [AdminController::class, "home"])->name("admin.home");
    // for categories CRUD
    Route::resource("/categories", CategoryController::class);
    // for product CRUD
    Route::resource("/products", ProductController::class);
});
