<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

// Auth Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Redirect to categories
Route::get('/', function() {
    return redirect()->route('categories.index');
});

// Protected Routes
Route::middleware(['web'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');

    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
});
