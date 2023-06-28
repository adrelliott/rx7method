<?php

namespace Database\Factories\Ask;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ask\Survey>
 */
class SurveyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'description' => fake()->paragraph(),
            'intro_text' => fake()->paragraph(),
            'outro_text' => fake()->paragraph(),
        ];
    }
}
