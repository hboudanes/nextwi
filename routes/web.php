<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Route;
Route::redirect('/', 'admin/users');
Route::redirect('/dashboard', 'admin/users');
Route::middleware(['auth', 'permissions'])->prefix('admin')->group(
    function () {
        // Roles & Permissions Management
    

        // User Routes
        Route::resource('users', UserController::class);

        // Business Routes
        Route::resource('businesses', BusinessController::class);
        // Location Routes
        Route::resource('locations', LocationController::class);
        Route::get('/locations/profile/{profile}/vouchers', function ($profileId) {
            return view('locations.profile_vouchers', compact('profileId'));
        });
        Route::get('/vouchers', [VoucherController::class, 'index'])->name('vouchers.index');
        Route::get('/vouchers/create', [VoucherController::class, 'createStandalone'])->name('vouchers.create');
        Route::get('/locations/{location}/profile/{profile}/vouchers/create', [VoucherController::class, 'create'])->name('locations.profile.vouchers.create');
    }
);
Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Roles & Permissions Routes
    Route::prefix('roles-permissions')->name('roles-permissions.')->group(function () {
        Route::get('/', [RolePermissionController::class, 'index'])->name('index');
        Route::get('/data', [RolePermissionController::class, 'getPermissions'])->name('data');
        Route::post('/roles', [RolePermissionController::class, 'store'])->name('roles.store');
        Route::get('/roles/{id}', [RolePermissionController::class, 'show'])->name('roles.show');
        Route::put('/roles/{id}', [RolePermissionController::class, 'update'])->name('roles.update');
        Route::delete('/roles/{id}', [RolePermissionController::class, 'destroy'])->name('roles.destroy');
        Route::post('/permissions/sync', [RolePermissionController::class, 'updatePermissions'])->name('permissions.sync');
        Route::post('/permissions/bulk-update', [RolePermissionController::class, 'bulkUpdatePermissions'])->name('permissions.bulk-update');
    });
});
// Test Routes
Route::get('/test/form-components', function () {
    return view('test.form-components');
})->name('test.form-components');

// Settings Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



require __DIR__ . '/auth.php';
