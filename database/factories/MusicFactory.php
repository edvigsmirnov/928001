<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Music>
 */
class MusicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'artist' => $this->faker->sentence(rand(1,5)),
            'album' => $this->faker->sentence(rand(1,4)),
            'year' => $this->faker->year
        ];
    }
}
