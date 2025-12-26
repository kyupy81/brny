<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Commune;
use App\Models\Quarter;
use Illuminate\Http\JsonResponse;

class LocationController extends Controller
{
    public function getCities(): JsonResponse
    {
        return response()->json(City::where('is_active', true)->orderBy('name')->get(['id', 'name']));
    }

    public function getCommunes(City $city): JsonResponse
    {
        return response()->json($city->communes()->where('is_active', true)->orderBy('name')->get(['id', 'name']));
    }

    public function getQuarters(Commune $commune): JsonResponse
    {
        return response()->json($commune->quarters()->where('is_active', true)->orderBy('name')->get(['id', 'name']));
    }
}
