<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cour>
 */
class CourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->sentence;
        // $description = fake()->paragraphs(asText: true);
        $duration = fake();
        $price = fake();
        $created_at = fake()->dateTimeBetween('-1 years');
        return [
            'title' => $title,
            'description' => fake()->paragraphs(asText: true),
            'duration' => $duration,
            'price' => $price,
            'created_at' => $created_at ,
            'updated_at' => $created_at ,
        ];
    }
}
