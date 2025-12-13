<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegistrationController;
use App\Http\Controllers\Api\PhotoController;

Route::prefix('v1')->group(function () {
    // Public OTP endpoints for clients
    Route::post('otp/request', [AuthController::class, 'requestOtp']);
    Route::post('otp/verify', [AuthController::class, 'verifyOtp']);

    // Auth for agents/admin (email/password)
    Route::post('auth/login', [AuthController::class, 'login']);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('auth/logout', [AuthController::class, 'logout']);

        // Registrations (dossier) - agent
        Route::get('registrations', [RegistrationController::class, 'index']);
        Route::post('registrations', [RegistrationController::class, 'store'])->middleware('role:agent');
        Route::get('registrations/{registration}', [RegistrationController::class, 'show']);
        Route::put('registrations/{registration}', [RegistrationController::class, 'update'])->middleware('role:agent');
        // validation restricted to admin
        Route::post('registrations/{registration}/validate', [RegistrationController::class, 'validateRegistration'])->middleware('role:admin');

        // Photos upload for registration
        Route::post('registrations/{registration}/photos', [PhotoController::class, 'upload'])->middleware('role:agent');

        // Search endpoint
        Route::get('search', [RegistrationController::class, 'search']);
    });

    // Public verification endpoint (QR token)
    Route::get('verify/{token}', [RegistrationController::class, 'verifyToken']);
});
