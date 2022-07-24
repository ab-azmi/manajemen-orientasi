<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tugas>
 */
class TugasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $arrPrior = ['medium', 'low', 'high'];
        return [
            'name' => $this->faker->sentence(),
            'deskripsi' => $this->faker->text(),
            'status' => $this->faker->numberBetween(0, 1),
            'due_date' => $this->faker->dateTimeBetween('-3 years', '+2 years'),
            'priority' => $arrPrior[array_rand($arrPrior)],
            'report' => UploadedFile::fake()->create('report.pdf', 200, 'pdf')
        ];
    }
}
