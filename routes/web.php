<?php

use App\Http\Controllers\ExploreController;
use Illuminate\Support\Facades\Route;

Route::name('explore.')->group(function() {
    Route::get('/', [ExploreController::class, 'index'])->name('index');
});