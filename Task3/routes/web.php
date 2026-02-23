<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'allProducts'])->name('home');

Route::prefix("/products")->group(function () {
    Route::get("/search", [ProductController::class, "findByName"])->name('products.search');

    Route::get("/available", [ProductController::class, "availableProducts"])->name("products.available");

    Route::post("/new", [ProductController::class, "addProduct"])->name('products.store');

    Route::get("/form", [ProductController::class, "showForm"])->name('products.form');

    Route::delete("/{name}", [ProductController::class, "deleteByName"])->name('products.destroy');
});
