<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $arr = ['yellow', 'blue', 'purple'];
        return [
            'name' => $this->faker->lastName(),
            'color' => $arr[array_rand($arr)]
        ];
    }
}
