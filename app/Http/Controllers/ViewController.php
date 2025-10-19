<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\TeamMember;
use App\Models\Event;

class ViewController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }

    public function welcome()
    {
        $team = TeamMember::orderBy('created_at', 'desc')->get();
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        $services = Service::orderBy('created_at', 'desc')->get();

        return view('welcome', compact('team', 'testimonials', 'services'));
        try {
            $services = Service::where('published', true)->orderBy('order')->get();
            $testimonials = Testimonial::where('published', true)->latest()->take(6)->get();
            $team = TeamMember::where('published', true)->orderBy('order')->get();
            $events = Event::where('published', true)->whereNotNull('starts_at')->orderBy('starts_at')->take(3)->get();

            return view('welcome', compact('services', 'testimonials', 'team', 'events'));
        } catch (\Exception $e) {
            \Log::error('Error in welcome method: ' . $e->getMessage());
            return view('test'); // Vue de secours en cas d'erreur
        }
    }
}
