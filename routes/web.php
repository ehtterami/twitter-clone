<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::name('explore.')->group(function() {
    Route::get('/', [ExploreController::class, 'index'])->name('index');
    Route::post('like/{post}', [ExploreController::class, 'likePost'])->name('likePost');
    Route::post('dis-like/{post}', [ExploreController::class, 'disLikePost'])->name('disLikePost');
    Route::get('{post}', [ExploreController::class, 'open'])->name('open');
    Route::post('comment-on/{post}', [PostController::class, 'comment'])->name('comment')->middleware(['web', 'auth']);
});

Route::prefix('profile')->name('profile.')->group(function() {
    Route::get('/details', [ProfileController::class, 'index'])->name('profile');
    Route::get('new', [PostController::class, 'create'])->name('post.create');
    Route::post('new/write', [PostController::class, 'store'])->name('post.store');
    Route::get('liked', [ProfileController::class, 'liked'])->name('liked');
})->middleware(['web', 'auth']);