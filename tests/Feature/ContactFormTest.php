<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use App\Mail\ContactReceived;
use App\Models\ContactMessage;

beforeEach(function () {
    // Ensure migrations are up for test DB (should be sqlite in memory by default in phpunit.xml)
    Artisan::call('migrate:fresh');
});

it('stores contact message and sends notification email', function () {
    Mail::fake();

    $payload = [
        'name' => 'Jean Dupont',
        'email' => 'jean@example.com',
        'phone' => '+22990123456',
        'message' => 'Bonjour, je souhaite en savoir plus sur vos services.'
    ];

    $this->post(route('contact.submit'), $payload)
        ->assertRedirect()
        ->assertSessionHas('status');

    $this->assertDatabaseHas('contact_messages', [
        'email' => 'jean@example.com',
        'name' => 'Jean Dupont'
    ]);

    Mail::assertSent(ContactReceived::class, function ($mail) use ($payload) {
        return $mail->hasTo(config('mail.from.address')) && $mail->data['email'] === $payload['email'];
    });
});
