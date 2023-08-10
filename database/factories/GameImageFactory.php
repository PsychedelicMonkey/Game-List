<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameImage>
 */
class GameImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => array(),
            'file_name' => fake()->words(asText: true),
            'original_name' => fake()->words(asText: true),
            'file_hash' => Str::random(32),
            'mime_type' => 'image/jpeg',
            'size' => fake()->randomDigit(),
        ];
    }
}
