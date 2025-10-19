<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(10);
        $consultations = Consultation::latest()->paginate(10);
        $unreadCount = ContactMessage::where('status', 'unread')->count();
        $totalCount = ContactMessage::count();
        $consultationsCount = Consultation::count();
        $pendingConsultationsCount = Consultation::where('status', 'pending')->orWhereNull('status')->count();

        return view('dashboard.messages.index', compact('messages', 'consultations', 'unreadCount', 'totalCount', 'consultationsCount', 'pendingConsultationsCount'));
    }

    public function show(ContactMessage $message)
    {
        // Marquer automatiquement comme lu lors de l'ouverture
        if ($message->status === 'unread') {
            $message->update(['status' => 'read']);
        }

        return view('dashboard.messages.show', compact('message'));
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return redirect()->route('dashboard.messages.index')
            ->with('success', 'Message supprimé avec succès.');
    }

    public function markAsRead(ContactMessage $message)
    {
        $message->update(['status' => 'read']);
        return redirect()->back()
            ->with('success', 'Message marqué comme lu.');
    }

    public function markAsUnread(ContactMessage $message)
    {
        $message->update(['status' => 'unread']);
        return redirect()->back()
            ->with('success', 'Message marqué comme non lu.');
    }
}
