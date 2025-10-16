<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\ConsultationRequest;
use App\Mail\ContactReceived;
use App\Mail\ConsultationRequested;
use App\Models\ContactMessage;
use App\Models\Consultation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function submitContact(ContactRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $message = ContactMessage::create($data);

        // Send notification to site admin (MAIL_TO env or fallback)
        $to = config('mail.from.address');
        Mail::to($to)->send(new ContactReceived($data));

        return redirect()->back()->with('status', 'Merci, votre message a été envoyé.');
    }

    public function submitConsultation(ConsultationRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $consultation = Consultation::create($data);

        $to = config('mail.from.address');
        Mail::to($to)->send(new ConsultationRequested($data));

        return redirect()->back()->with('status', 'Votre demande de consultation a été reçue.');
    }
}
