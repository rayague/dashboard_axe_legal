<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    public function definition()
    {
        return [
            'author' => $this->faker->name,
            'role' => $this->faker->jobTitle,
            'content' => $this->faker->paragraph(3),
            'avatar' => null,
            'published' => true,
        ];
    }
}
