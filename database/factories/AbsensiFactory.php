<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\SesiAbsensi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Absensi>
 */
class AbsensiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'time_absen' => $this->faker->time('H:i'),
            'confirm' => $this->faker->numberBetween(0, 1),
            'user_id' => User::all()->random()->id,
            'sesi_absensi_id' => SesiAbsensi::all()->random()->id
        ];
    }
}
