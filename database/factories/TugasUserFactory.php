<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Tugas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TugasUser>
 */
class TugasUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tugas_id' => Tugas::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'status' => $this->faker->numberBetween(0, 1)
        ];
    }
}
