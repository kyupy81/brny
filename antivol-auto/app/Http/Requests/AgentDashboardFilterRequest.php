<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentDashboardFilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'q' => 'nullable|string|max:255',
            'from' => 'nullable|date',
            'to' => 'nullable|date|after_or_equal:from',
            'city_id' => 'nullable|exists:cities,id',
            'commune_id' => 'nullable|exists:communes,id',
            'quarter_id' => 'nullable|exists:quarters,id',
            'brand_id' => 'nullable|exists:vehicle_brands,id',
            'model_id' => 'nullable|exists:vehicle_models,id',
            'year' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'status' => 'nullable|in:ALL,ACTIVE,STOLEN,PENDING',
        ];
    }
}
