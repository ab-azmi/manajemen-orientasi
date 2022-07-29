<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SesiAbsensi>
 */
class SesiAbsensiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'date_absen' => $this->faker->date(),
            'waktu_mulai' => $this->faker->time('H:i'),
            'waktu_selesai' => $this->faker->time('H:i'),
            'event_id' => Event::all()->random()->id
        ];
    }
}
