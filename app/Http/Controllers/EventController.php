<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with(['participants', 'organizer'])
            ->orderBy('starts_at')
            ->paginate(10);

        return view('dashboard.evenements.index', compact('events'));
    }

    public function create()
    {
        return view('dashboard.evenements.creer');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'starts_at' => 'required|date|after:now',
            'ends_at' => 'required|date|after:starts_at',
            'location' => 'required_if:event_type,in-person,hybrid',
            'webinar_link' => 'required_if:event_type,webinar,hybrid',
            'max_participants' => 'nullable|integer|min:1',
            'event_type' => 'required|in:in-person,webinar,hybrid',
            'image' => 'nullable|image|max:2048',
            'materials' => 'nullable|array',
            'materials.*' => 'file|max:10240'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events/images');
        }

        $materials = [];
        if ($request->hasFile('materials')) {
            foreach ($request->file('materials') as $file) {
                $materials[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => $file->store('events/materials')
                ];
            }
        }

        $event = Event::create($validated + [
            'organizer_id' => auth()->id(),
            'materials' => $materials
        ]);

        return redirect()->route('dashboard.evenements.show', $event)
            ->with('success', 'Événement créé avec succès.');
    }

    public function show(Event $event)
    {
        $event->load(['participants', 'organizer']);
        return view('dashboard.evenements.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('dashboard.evenements.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'starts_at' => 'required|date',
            'ends_at' => 'required|date|after:starts_at',
            'location' => 'required_if:event_type,in-person,hybrid',
            'webinar_link' => 'required_if:event_type,webinar,hybrid',
            'max_participants' => 'nullable|integer|min:1',
            'event_type' => 'required|in:in-person,webinar,hybrid',
            'image' => 'nullable|image|max:2048',
            'materials' => 'nullable|array',
            'materials.*' => 'file|max:10240'
        ]);

        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::delete($event->image);
            }
            $validated['image'] = $request->file('image')->store('events/images');
        }

        if ($request->hasFile('materials')) {
            $materials = $event->materials ?? [];
            foreach ($request->file('materials') as $file) {
                $materials[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => $file->store('events/materials')
                ];
            }
            $validated['materials'] = $materials;
        }

        $event->update($validated);

        return redirect()->route('dashboard.evenements.show', $event)
            ->with('success', 'Événement mis à jour avec succès.');
    }

    public function destroy(Event $event)
    {
        if ($event->image) {
            Storage::delete($event->image);
        }

        if (!empty($event->materials)) {
            foreach ($event->materials as $material) {
                Storage::delete($material['path']);
            }
        }

        $event->delete();

        return redirect()->route('dashboard.evenements.index')
            ->with('success', 'Événement supprimé avec succès.');
    }

    public function register(Event $event)
    {
        if ($event->isFullyBooked()) {
            return back()->with('error', 'Cet événement est complet.');
        }

        $event->participants()->attach(auth()->id(), [
            'registered_at' => now(),
            'status' => 'registered'
        ]);

        return back()->with('success', 'Inscription confirmée.');
    }

    public function unregister(Event $event)
    {
        $event->participants()->detach(auth()->id());
        return back()->with('success', 'Inscription annulée.');
    }

    public function participants(Event $event)
    {
        $participants = $event->participants()
            ->withPivot(['registered_at', 'status', 'attended'])
            ->paginate(20);

        return view('dashboard.evenements.participants', compact('event', 'participants'));
    }

    public function updateAttendance(Event $event, Request $request)
    {
        $validated = $request->validate([
            'participants' => 'required|array',
            'participants.*' => 'boolean'
        ]);

        foreach ($validated['participants'] as $userId => $attended) {
            $event->participants()->updateExistingPivot($userId, ['attended' => $attended]);
        }

        return back()->with('success', 'Présences mises à jour.');
    }

    public function materials(Event $event)
    {
        return view('dashboard.evenements.materials', compact('event'));
    }

    public function addMaterial(Event $event, Request $request)
    {
        $request->validate([
            'material' => 'required|file|max:10240'
        ]);

        $materials = $event->materials ?? [];
        $file = $request->file('material');
        
        $materials[] = [
            'name' => $file->getClientOriginalName(),
            'path' => $file->store('events/materials')
        ];

        $event->update(['materials' => $materials]);

        return back()->with('success', 'Document ajouté avec succès.');
    }

    public function removeMaterial(Event $event, $materialIndex)
    {
        $materials = $event->materials;
        
        if (isset($materials[$materialIndex])) {
            Storage::delete($materials[$materialIndex]['path']);
            unset($materials[$materialIndex]);
            $event->update(['materials' => array_values($materials)]);
        }

        return back()->with('success', 'Document supprimé avec succès.');
    }

    public function downloadMaterial(Event $event, $materialIndex)
    {
        $materials = $event->materials;
        
        if (!isset($materials[$materialIndex])) {
            abort(404);
        }

        $material = $materials[$materialIndex];
        return Storage::download($material['path'], $material['name']);
    }

    public function webinar(Event $event)
    {
        if (!in_array($event->event_type, ['webinar', 'hybrid'])) {
            abort(404);
        }

        return view('dashboard.evenements.webinar', compact('event'));
    }
}