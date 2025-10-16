<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'starts_at' => $this->starts_at->toISOString(),
            'ends_at' => $this->ends_at->toISOString(),
            'location' => $this->location,
            'event_type' => $this->event_type,
            'webinar_link' => $this->when($this->isWebinar(), $this->webinar_link),
            'image' => $this->image ? asset('storage/' . $this->image) : null,
            'materials' => $this->materials,
            'max_participants' => $this->max_participants,
            'published' => $this->published,
            'remaining_spots' => $this->getRemainingSpots(),
            'is_full' => !$this->hasAvailableSpots(),
            'participant_count' => $this->participants_count ?? $this->participants()->count(),
            'organizer' => new UserResource($this->whenLoaded('organizer')),
            'participants' => UserResource::collection($this->whenLoaded('participants')),
            'created_at' => $this->created_at->toISOString(),
            'updated_at' => $this->updated_at->toISOString(),
        ];
    }
}