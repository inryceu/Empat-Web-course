<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return redirect()->route('games.index');
});

Route::resource('games', GameController::class);
Route::resource('publishers', PublisherController::class);
Route::resource('categories', CategoryController::class);
