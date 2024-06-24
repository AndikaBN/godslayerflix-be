<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnimeMovie>
 */
class AnimeMovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'genre_id' => $this->faker->numberBetween(1, 3),
            'description' => $this->faker->paragraph(3),
            'status' => $this->faker->randomElement(['OnGoing', 'End']),
            'image' => $this->faker->imageUrl(),
            'video' => $this->faker->url(),
        ];
    }
}
