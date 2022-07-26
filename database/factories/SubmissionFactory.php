<?php

namespace Database\Factories;

use App\Models\Tugas;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Submission>
 */
class SubmissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'judul' => fake()->sentence(),
            'file' => UploadedFile::fake()->create('submission.pdf', 300, 'pdf'),
            'catatan' => $this->faker->paragraph(),
            'date_submitted' => $this->faker->dateTime('now'),
            'user_id' => User::all()->random()->id,
            'tugas_id' => Tugas::all()->random()->id,
        ];
    }
}
