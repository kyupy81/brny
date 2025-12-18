<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TheftController;
use App\Http\Controllers\VehicleCatalogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Agent Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Admin Dashboard
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'verified']) // Add admin middleware if available, or check in controller/middleware
    ->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// BRNY Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/registrations/create', [RegistrationController::class, 'create'])->name('registrations.create');
    Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');
});

Route::get('/thefts', [TheftController::class, 'index'])->name('thefts.index');
Route::get('/thefts/create', [TheftController::class, 'create'])->name('thefts.create');
Route::post('/thefts', [TheftController::class, 'store'])->name('thefts.store');

// API Routes for Catalog
Route::get('/api/brands', [VehicleCatalogController::class, 'getBrands']);
Route::get('/api/brands/{brand}/models', [VehicleCatalogController::class, 'getModels']);

require __DIR__.'/auth.php';