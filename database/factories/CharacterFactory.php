<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Character>
 */
class CharacterFactory extends Factory
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
            'age'=>fake()->text($maxNbChars = 5),
            'species'=>fake()->text($maxNbChars = 15),
            'class'=>fake()->text($maxNbChars = 25),
            'subclass'=>fake()->text($maxNbChars = 25),
        ];
    }
}
