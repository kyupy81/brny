<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LocationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/cities', [LocationController::class, 'getCities']);
Route::get('/cities/{city}/communes', [LocationController::class, 'getCommunes']);
Route::get('/communes/{commune}/quarters', [LocationController::class, 'getQuarters']);
