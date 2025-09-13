<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OAuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('oauth')->name('oauth.')->middleware(['web'])->group(function() {
    Route::get('{driver}/redirect', [OAuthController::class, 'redirect'])->name('redirect');
    Route::get('{driver}/callback', [OAuthController::class, 'callback'])->name('callback');
});

Route::prefix('home')->name('home.')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('index');
})->middleware(['web', 'auth']);

Route::name('explore.')->group(function() {
    Route::get('/', [ExploreController::class, 'index'])->name('index');
    Route::get('profile', [ExploreController::class, 'profile'])->name('profile')->middleware(['web', 'auth']);
    Route::post('like/{post}', [ExploreController::class, 'likePost'])->name('likePost');
    Route::post('dis-like/{post}', [ExploreController::class, 'disLikePost'])->name('disLikePost');
    Route::get('{post}', [ExploreController::class, 'open'])->name('open');
    Route::post('comment-on/{post}', [PostController::class, 'comment'])->name('comment')->middleware(['web', 'auth']);
    Route::post('follow/{user}', [ExploreController::class, 'follow'])->name('follow');
    Route::post('unfollow/{user}', [ExploreController::class, 'unfollow'])->name('unfollow');
});

Route::prefix('profile')->name('profile.')->group(function() {
    Route::get('/details', [ProfileController::class, 'index'])->name('profile');
    Route::get('new', [PostController::class, 'create'])->name('post.create');
    Route::post('new/write', [PostController::class, 'store'])->name('post.store');
    Route::get('liked', [ProfileController::class, 'liked'])->name('liked');
    Route::get('followings', [ProfileController::class, 'followings'])->name('followings');
    Route::get('followers', [ProfileController::class, 'followers'])->name('followers');
})->middleware(['web', 'auth']);