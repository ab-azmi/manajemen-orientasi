<?php

namespace Database\Factories;

use App\Models\EventDay;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $colors = ['bg-green-100', 'bg-purple-100', 'bg-yellow-100'];
        return [
            'name' => $this->faker->sentence(3),
            'color' => $colors[array_rand($colors)],
            'catatan' => $this->faker->text(),
            'time' => $this->faker->time(),
            'event_day_id' => EventDay::all()->random()->id
        ];
    }
}
