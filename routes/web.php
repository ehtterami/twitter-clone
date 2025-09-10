<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::name('explore.')->group(function() {
    Route::get('/', [ExploreController::class, 'index'])->name('index');
});

Route::prefix('profile')->name('profile.')->group(function() {
    Route::get('new', [PostController::class, 'create'])->name('post.create');
    Route::post('new/write', [PostController::class, 'store'])->name('post.store');
});