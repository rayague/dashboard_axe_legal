<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    public function definition()
    {
        return [
            'client_name' => $this->faker->name,
            'client_email' => $this->faker->safeEmail,
            'client_phone' => $this->faker->phoneNumber,
            'scheduled_at' => $this->faker->dateTimeBetween('now', '+1 month'),
            'status' => 'confirmed',
            'notes' => null,
        ];
    }
}
