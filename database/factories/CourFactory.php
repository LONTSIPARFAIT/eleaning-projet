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
        // $title = $this->faker->unique()->sentence;
        // $description = $this->faker->paragraphs(asText: true);
        // $duration = $this->faker;
        // $price = $this->faker;
        $created_at = $this->faker->dateTimeBetween('-1 years');
        return [
            'title' => $this->faker->unique()->sentence,
            'description' => $this->faker->paragraphs(asText: true),
            'duration' => $this->faker->randomDigit,
            'price' => $this->faker->randomDigit,
            'teacher_id' => $this->faker->randomDigit,
            'created_at' => $created_at ,
            'updated_at' => $created_at ,
        ];
    }
}
