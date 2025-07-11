<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Jobs;
use Illuminate\Contracts\Queue\Job;

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
            'experience' => fake()->randomElement(array_keys(Jobs::getExperienceLevels())),
        ];
    }
}
