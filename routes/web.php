<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
Route::redirect('/', '/users');
Route::get('roles_permissions', function () {
    return view('roles_permissions.index');
})->name('roles_permissions');

Route::get('users', function () {
    return view('users.index');
})->name('users');
Route::get('users/create', function () {
    return view('users.create');
})->name('users.create');
Route::get('users/edit', function () {
    return view('users.edit');
})->name('users.edit');

// Business Routes
Route::get('businesses', function () {
    return view('businesses.index');
})->name('businesses.index');

Route::get('businesses/create', function () {
    return view('businesses.create');
})->name('businesses.create');

Route::get('businesses/{id}/edit', function ($id) {
    return view('businesses.edit', ['id' => $id]);
})->name('businesses.edit');
Route::get('businesses/{id}/show', function ($id) {
    return view('businesses.show', ['id' => $id]);
})->name('businesses.show');
Route::post('businesses', function () {
    // Store logic here
})->name('businesses.store');

Route::delete('businesses/{id}', function ($id) {
    // Delete logic here
})->name('businesses.destroy');
// Location Routes
Route::get('locations', function () {
    return view('locations.index');
})->name('locations.index');

Route::get('locations/create', function () {
    return view('locations.create');
})->name('locations.create');

Route::get('locations/{id}/edit', function ($id) {
    return view('locations.edit', ['id' => $id]);
})->name('locations.edit');

Route::post('locations', function () {
    // Store logic here
})->name('locations.store');

Route::delete('locations/{id}', function ($id) {
    // Delete logic here
})->name('locations.destroy');
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
