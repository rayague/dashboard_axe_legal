<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PartnershipFactory extends Factory
{
    public function definition()
    {
        return [
            'organization' => $this->faker->company,
            'contact_person' => $this->faker->name,
            'email' => $this->faker->companyEmail,
            'phone' => $this->faker->phoneNumber,
            'notes' => $this->faker->sentence,
            'status' => 'active',
        ];
    }
}
