<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;
Route::redirect('/', '/users');
Route::get('roles_permissions', function () {
    return view('roles_permissions.index');
})->name('roles_permissions');

// User Routes
Route::resource('users', UserController::class);

// Business Routes
Route::resource('businesses', BusinessController::class);
// Location Routes
Route::resource('locations', LocationController::class);
// Settings Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
