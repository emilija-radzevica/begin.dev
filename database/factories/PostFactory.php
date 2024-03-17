<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'affiliation'=>fake()->numberBetween(1, 2),
            'category'=>fake()->numberBetween(1, 5),
            'name'=>fake()->name(),
            'universe'=>fake()->country(),
            'summary'=>fake()->paragraph(2),
            'tags'=>('Urban fantasy, Grishaverse, Troll'),
        ];
    }
}
