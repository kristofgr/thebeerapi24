<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brewery;
use App\Models\Color;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beer>
 */
class BeerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $breweries = Brewery::pluck('id')->toArray();
        $colors = Color::pluck('id')->toArray();

        return [
            'name' => fake()->name(),
            'description' => fake()->text(50),
            'brewery_id' => fake()->randomElement($breweries),
            'color_id' => fake()->randomElement($colors),
            'published' => rand(0, 1)
        ];
    }
}
