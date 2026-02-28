<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('products.index');
})->name('home');

Route::prefix('/products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');

    Route::get('/search', [ProductController::class, 'search'])->name('search');

    Route::get('/available', [ProductController::class, 'available'])->name('available');

    Route::get('/create', [ProductController::class, 'create'])->name('create');

    Route::post('/', [ProductController::class, 'store'])->name('store');

    Route::get('/{id}', [ProductController::class, 'show'])->name('show');

    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
});
