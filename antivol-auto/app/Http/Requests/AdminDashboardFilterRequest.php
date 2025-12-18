<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminDashboardFilterRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Authorization handled by middleware/gates
    }

    public function rules()
    {
        return [
            'from' => 'nullable|date',
            'to' => 'nullable|date|after_or_equal:from',
            'commune' => 'nullable|string',
            'brand_id' => 'nullable|exists:vehicle_brands,id',
            'model_id' => 'nullable|exists:vehicle_models,id',
            'year' => 'nullable|integer|min:1995|max:' . (date('Y') + 1),
            'status' => 'nullable|in:ALL,ACTIVE,STOLEN,PENDING',
            'agent_id' => 'nullable|exists:users,id',
        ];
    }
}

