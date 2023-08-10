<?php

namespace Database\Factories;

use App\Models\Developer;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(fake()->randomDigit(), true),
            'release_date' => fake()->date(),
            'developer_id' => Developer::factory()->create(),
            'genre_id' => Genre::factory()->create(),
        ];
    }
}
