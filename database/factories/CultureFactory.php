<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Culture>
 */
class CultureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'postID'=>fake()->text($maxNbChars = 5 ),
            'aspect'=>fake()->text($maxNbChars = 10),
            'region'=>fake()->country(),
        ];
    }
}
