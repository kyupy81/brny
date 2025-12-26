<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegistrationController;
use App\Http\Controllers\Api\PhotoController;

Route::prefix('v1')->group(function () {
    // Public OTP endpoints pour clients (avec rate limiting)
    Route::post('otp/request', [AuthController::class, 'requestOtp'])
        ->middleware('throttle:5,1'); // Max 5 requêtes par minute
    
    Route::post('otp/verify', [AuthController::class, 'verifyOtp'])
        ->middleware('throttle:10,1'); // Max 10 tentatives par minute

    // Authentification agents/admin (email/password)
    Route::post('auth/login', [AuthController::class, 'login'])
        ->middleware('throttle:10,1');

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('auth/logout', [AuthController::class, 'logout']);

        // Enregistrements - agent
        Route::get('registrations', [RegistrationController::class, 'index']);
        Route::post('registrations', [RegistrationController::class, 'store'])
            ->middleware('role:agent');
        Route::get('registrations/{registration}', [RegistrationController::class, 'show']);
        Route::put('registrations/{registration}', [RegistrationController::class, 'update'])
            ->middleware('role:agent');
        
        // Validation restreinte à admin
        Route::post('registrations/{registration}/validate', [RegistrationController::class, 'validateRegistration'])
            ->middleware('role:admin');

        // Upload de photos
        Route::post('registrations/{registration}/photos', [PhotoController::class, 'upload'])
            ->middleware('role:agent')
            ->middleware('throttle:30,1'); // Max 30 uploads par minute

        // Recherche
        Route::get('search', [RegistrationController::class, 'search']);
    });

    // Vérification publique (jeton QR)
    Route::get('verify/{token}', [RegistrationController::class, 'verifyToken']);
});