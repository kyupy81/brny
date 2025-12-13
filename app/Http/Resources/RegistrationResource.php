<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'registration_number' => $this->registration_number,
            'vehicle' => $this->whenLoaded('vehicle'),
            'owner' => $this->whenLoaded('owner'),
            'agent' => $this->whenLoaded('agent'),
            'status' => $this->status,
            'validated_at' => $this->validated_at,
            'created_at' => $this->created_at,
        ];
    }
}
