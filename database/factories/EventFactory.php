<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        $eventType = $this->faker->randomElement(['in-person', 'webinar']);
        $startsAt = $this->faker->dateTimeBetween('now', '+2 months');
        $endsAt = clone $startsAt;
        $endsAt->modify('+2 hours');

        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'starts_at' => $startsAt,
            'ends_at' => $endsAt,
            'location' => $eventType === 'in-person' ? $this->faker->address : null,
            'image' => null,
            'published' => true,
            'event_type' => $eventType,
            'webinar_link' => $eventType === 'webinar' ? 'https://meet.google.com/' . $this->faker->slug : null,
            'max_participants' => $this->faker->optional()->numberBetween(10, 100),
            'materials' => $this->faker->optional()->randomElements(['presentation.pdf', 'handout.pdf', 'worksheet.docx']),
            'organizer_id' => User::factory(),
        ];
    }

    public function unpublished()
    {
        return $this->state(function (array $attributes) {
            return [
                'published' => false,
            ];
        });
    }

    public function webinar()
    {
        return $this->state(function (array $attributes) {
            return [
                'event_type' => 'webinar',
                'location' => null,
                'webinar_link' => 'https://meet.google.com/' . $this->faker->slug,
            ];
        });
    }

    public function inPerson()
    {
        return $this->state(function (array $attributes) {
            return [
                'event_type' => 'in-person',
                'location' => $this->faker->address,
                'webinar_link' => null,
            ];
        });
    }
}
