<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'profile_photo' => $this->profile_photo ? asset('storage/' . $this->profile_photo) : null,
            'created_at' => $this->created_at->toISOString(),
            'updated_at' => $this->updated_at->toISOString(),
            // Additional pivot data for event participants
            'status' => $this->whenPivotLoaded('event_participants', function () {
                return $this->pivot->status;
            }),
            'attended' => $this->whenPivotLoaded('event_participants', function () {
                return (bool) $this->pivot->attended;
            }),
        ];
    }
}