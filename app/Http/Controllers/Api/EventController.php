<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::with(['organizer', 'participants'])
            ->when($request->type, function ($query, $type) {
                return $query->where('event_type', $type);
            })
            ->when($request->search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when($request->status === 'upcoming', function ($query) {
                return $query->upcoming();
            })
            ->when($request->status === 'past', function ($query) {
                return $query->where('ends_at', '<', now());
            });

        return EventResource::collection(
            $query->orderBy('starts_at', 'desc')->paginate(10)
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'starts_at' => 'required|date|after:now',
            'ends_at' => 'required|date|after:starts_at',
            'event_type' => ['required', Rule::in(['in-person', 'webinar'])],
            'location' => 'required_if:event_type,in-person|nullable|string',
            'webinar_link' => 'required_if:event_type,webinar|nullable|url',
            'max_participants' => 'nullable|integer|min:1',
            'image' => 'nullable|image|max:2048',
            'materials' => 'nullable|array',
            'materials.*' => 'file|mimes:pdf,doc,docx,ppt,pptx|max:10240',
            'published' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events/images', 'public');
        }

        $materials = [];
        if ($request->hasFile('materials')) {
            foreach ($request->file('materials') as $material) {
                $path = $material->store('events/materials', 'public');
                $materials[] = [
                    'name' => $material->getClientOriginalName(),
                    'path' => $path
                ];
            }
        }
        $validated['materials'] = $materials;
        $validated['organizer_id'] = Auth::id();

        $event = Event::create($validated);

        return response()->json([
            'message' => 'Event created successfully',
            'event' => $event->load('organizer')
        ], 201);
    }

    public function show(Event $event)
    {
        $event->load(['organizer', 'participants']);
        return new EventResource($event);
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'starts_at' => 'sometimes|required|date',
            'ends_at' => 'sometimes|required|date|after:starts_at',
            'event_type' => ['sometimes', 'required', Rule::in(['in-person', 'webinar'])],
            'location' => 'required_if:event_type,in-person|nullable|string',
            'webinar_link' => 'required_if:event_type,webinar|nullable|url',
            'max_participants' => 'nullable|integer|min:1',
            'image' => 'nullable|image|max:2048',
            'materials' => 'nullable|array',
            'materials.*' => 'file|mimes:pdf,doc,docx,ppt,pptx|max:10240',
            'published' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $validated['image'] = $request->file('image')->store('events/images', 'public');
        }

        if ($request->hasFile('materials')) {
            $materials = $event->materials ?? [];
            foreach ($request->file('materials') as $material) {
                $path = $material->store('events/materials', 'public');
                $materials[] = [
                    'name' => $material->getClientOriginalName(),
                    'path' => $path
                ];
            }
            $validated['materials'] = $materials;
        }

        $event->update($validated);

        return response()->json([
            'message' => 'Event updated successfully',
            'event' => $event->load('organizer')
        ]);
    }

    public function destroy(Event $event)
    {
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }

        if ($event->materials) {
            foreach ($event->materials as $material) {
                Storage::disk('public')->delete($material['path']);
            }
        }

        $event->delete();

        return response()->json([
            'message' => 'Event deleted successfully'
        ]);
    }

    public function register(Event $event)
    {
        if (!$event->hasAvailableSpots()) {
            return response()->json([
                'message' => 'Event is fully booked'
            ], 422);
        }

        if ($event->isParticipant(Auth::id())) {
            return response()->json([
                'message' => 'Already registered for this event'
            ], 422);
        }

        $event->participants()->attach(Auth::id(), [
            'status' => 'registered'
        ]);

        return response()->json([
            'message' => 'Successfully registered for the event'
        ]);
    }

    public function cancelRegistration(Event $event)
    {
        if (!$event->isParticipant(Auth::id())) {
            return response()->json([
                'message' => 'Not registered for this event'
            ], 422);
        }

        $event->participants()->detach(Auth::id());

        return response()->json([
            'message' => 'Registration cancelled successfully'
        ]);
    }

    public function updateAttendance(Request $request, Event $event)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'attended' => 'required|boolean'
        ]);

        if (!$event->isParticipant($validated['user_id'])) {
            return response()->json([
                'message' => 'User is not registered for this event'
            ], 422);
        }

        $event->markAttendance($validated['user_id'], $validated['attended']);

        return response()->json([
            'message' => 'Attendance updated successfully'
        ]);
    }

    public function updateParticipantStatus(Request $request, Event $event)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => ['required', Rule::in(['registered', 'confirmed', 'cancelled'])]
        ]);

        if (!$event->isParticipant($validated['user_id'])) {
            return response()->json([
                'message' => 'User is not registered for this event'
            ], 422);
        }

        $event->updateParticipantStatus($validated['user_id'], $validated['status']);

        return response()->json([
            'message' => 'Participant status updated successfully'
        ]);
    }

    public function getMaterials(Event $event)
    {
        return response()->json([
            'materials' => $event->materials
        ]);
    }

    public function removeMaterial(Event $event, $materialIndex)
    {
        $materials = $event->materials ?? [];
        
        if (isset($materials[$materialIndex])) {
            Storage::disk('public')->delete($materials[$materialIndex]['path']);
            unset($materials[$materialIndex]);
            $event->update(['materials' => array_values($materials)]);
        }

        return response()->json([
            'message' => 'Material removed successfully'
        ]);
    }

    public function downloadMaterial(Event $event, $materialIndex)
    {
        $materials = $event->materials ?? [];
        
        if (!isset($materials[$materialIndex])) {
            return response()->json([
                'message' => 'Material not found'
            ], 404);
        }

        $material = $materials[$materialIndex];
        $path = Storage::disk('public')->path($material['path']);
        
        if (!Storage::disk('public')->exists($material['path'])) {
            return response()->json([
                'message' => 'Material file not found'
            ], 404);
        }

        return Response::download($path, $material['name']);
    }
}