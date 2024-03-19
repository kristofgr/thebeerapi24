<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName() . " " . fake()->lastName(),
            'email' => fake()->safeEmail(),
            'message' => fake()->paragraph(),
            'ip' => fake()->ipv4(),
            'read' => rand(0, 1)
        ];
    }
}
