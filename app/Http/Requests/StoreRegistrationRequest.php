<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user() != null; // require auth for creation (agent)
    }

    public function rules()
    {
        return [
            'plate_number' => 'required|string',
            'make' => 'nullable|string',
            'model' => 'nullable|string',
            'color' => 'nullable|string',
            'vin' => 'nullable|string',
            'mirror_engraving_code' => 'required|string',
            'owner_name' => 'required|string',
            'owner_phone' => 'required|string',
            'address' => 'nullable|string',
            'commune' => 'nullable|string',
            'piece_identity' => 'nullable|string',
            'notes' => 'nullable|string',
        ];
    }
}
