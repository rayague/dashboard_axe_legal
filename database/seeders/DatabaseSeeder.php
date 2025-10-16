<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // password
        ]);

        // Site content
        \App\Models\Service::factory()->count(6)->create();
        \App\Models\Testimonial::factory()->count(4)->create();
        \App\Models\TeamMember::factory()->count(4)->create();
        \App\Models\Event::factory()->count(3)->create();
        \App\Models\Partnership::factory()->count(3)->create();
        \App\Models\Appointment::factory()->count(5)->create();
    }
}
