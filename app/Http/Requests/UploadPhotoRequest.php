<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadPhotoRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user() != null;
    }

    public function rules()
    {
        return [
            'photos' => 'required|array|min:1',
            'photos.*' => 'file|mimes:jpg,jpeg,png|max:5120',
            'type' => 'required|string|in:plate,mirror_engraving,front,doc,other',
        ];
    }
}
