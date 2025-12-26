<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TheftController;
use App\Http\Controllers\VehicleCatalogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\OperationsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Agent\DashboardController as AgentDashboardController;
use App\Http\Controllers\Agent\FieldController;
use App\Http\Controllers\Agent\RegistrationListController;
use App\Http\Controllers\Agent\ExportController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserImportController;
use App\Http\Controllers\Admin\AgentBadgeController;
use App\Http\Controllers\Admin\TheftController as AdminTheftController;
use App\Livewire\AgentVehicleWizard;
use App\Http\Controllers\SupportController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Public Registration
Route::get('/registrations/create', [RegistrationController::class, 'create'])->name('registrations.create');
Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');

// Public Search
Route::get('/search', [VehicleCatalogController::class, 'search'])->name('search');

// Public Theft Reporting
Route::get('/theft-reports/create', [TheftController::class, 'create'])->name('thefts.create');
Route::post('/theft-reports', [TheftController::class, 'store'])->name('thefts.store');
Route::get('/thefts', [TheftController::class, 'index'])->name('thefts.index');

// Agent Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Admin Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');
    Route::get('/operations', [OperationsController::class, 'index'])->name('operations');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::get('users/import', [UserImportController::class, 'show'])->name('users.import');
    Route::post('users/import', [UserImportController::class, 'store'])->name('users.import.store');
    Route::post('users/{user}/action', [UserController::class, 'action'])->name('users.action');
    Route::resource('users', UserController::class);
    Route::resource('thefts', AdminTheftController::class)->only(['index', 'show', 'update']);

    // Vehicle Catalog
    Route::resource('brands', App\Http\Controllers\Admin\BrandController::class)->except(['show', 'create', 'edit']);
    Route::resource('brands.models', App\Http\Controllers\Admin\ModelController::class)->except(['show', 'create', 'edit']);

    // Local Site
    Route::get('local-site', [App\Http\Controllers\Admin\LocalSiteController::class, 'show'])->name('local_site.show');
    Route::post('local-site/open', [App\Http\Controllers\Admin\LocalSiteController::class, 'open'])->name('local_site.open');

    // OTP
    Route::post('otp/generate', [App\Http\Controllers\Admin\OtpController::class, 'generate'])->name('otp.generate');
    Route::get('agents/{user}/badge', [AgentBadgeController::class, 'show'])->name('agents.badge');
});

// Agent Routes
Route::middleware(['auth', 'verified'])->prefix('agent')->name('agent.')->group(function () {
    Route::get('/dashboard', [AgentDashboardController::class, 'index'])->name('dashboard');
    Route::get('/field', [FieldController::class, 'index'])->name('field');
    Route::get('/registrations/new', AgentVehicleWizard::class)->name('registrations.new');
    Route::get('/registrations', [RegistrationListController::class, 'index'])->name('registrations.index');
    Route::get('/registrations/{registration}/pdf', [RegistrationListController::class, 'downloadPdf'])->name('registrations.pdf');
    Route::get('/profile', [App\Http\Controllers\Agent\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Agent\ProfileController::class, 'update'])->name('profile.update');
});

// Support Routes
Route::middleware(['auth', 'verified'])->prefix('support')->name('support.')->group(function () {
    Route::get('/', [SupportController::class, 'index'])->name('index');
    Route::post('/otp/generate', [SupportController::class, 'generateOtp'])->name('otp.generate');
    Route::post('/otp/verify', [SupportController::class, 'verifyOtp'])->name('otp.verify');
});

require __DIR__.'/auth.php';

