<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadPhotoRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user() !== null;
    }

    public function rules()
    {
        return [
            'photos' => 'required|array|min:1|max:10',
            'photos.*' => 'required|file|mimes:jpeg,jpg,png|max:5120|image',
            'type' => 'required|string|in:plate,mirror_engraving,front,doc,other',
        ];
    }

    public function messages()
    {
        return [
            'photos.required' => 'At least one photo is required',
            'photos.max' => 'Maximum 10 photos allowed',
            'photos.*.mimes' => 'Only JPEG and PNG images are allowed',
            'photos.*.max' => 'Each photo must be less than 5MB',
            'type.in' => 'Invalid photo type',
        ];
    }
}