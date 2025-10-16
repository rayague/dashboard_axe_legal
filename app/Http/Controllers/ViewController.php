<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $services = Service::where('published', true)->orderBy('order')->get();
        $testimonials = Testimonial::where('published', true)->latest()->take(6)->get();
        $team = TeamMember::where('published', true)->orderBy('order')->get();
        $events = Event::where('published', true)->whereNotNull('starts_at')->orderBy('starts_at')->take(3)->get();

        return view('welcome', compact('services', 'testimonials', 'team', 'events'));
    }
}
