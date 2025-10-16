<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeamMemberFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'role' => $this->faker->jobTitle,
            'bio' => $this->faker->paragraph(2),
            'photo' => null,
            'order' => 0,
            'published' => true,
        ];
    }
}
