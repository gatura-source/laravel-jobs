<?php

namespace Database\Factories;

use App\Models\Jobs;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jobs>
 */
class JobsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraph(),
            'salary' => fake()->numberBetween(50000, 120000),
            'location' => fake()->city(),
            'category' => fake()->randomElement(Jobs::getCategories()),
            'experience' => fake()->randomElement((Jobs::getExperienceLevels())),
        ];
    }
}
