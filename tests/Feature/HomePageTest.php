<?php

use Illuminate\Support\Facades\Artisan;
use App\Models\Service;
use App\Models\Testimonial;

beforeEach(function () {
    Artisan::call('migrate:fresh');
});

it('shows services and testimonials on the homepage', function () {
    $service = Service::factory()->create(['title' => 'Test Service Alpha']);
    $testimonial = Testimonial::factory()->create(['author' => 'Client X', 'content' => 'Excellent service']);

    $this->get(route('welcome'))
        ->assertStatus(200)
        ->assertSee('Test Service Alpha')
        ->assertSee('Excellent service');
});
