<?php

namespace Database\Factories;

use App\Models\Cour;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cours = Cour::all();
        $created_at = $this->faker->dateTimeBetween('-1 years');
        return [
            'title' => $this->faker->unique()->sentence,
            'description' => $this->faker->paragraphs(asText: true),
            'duration' => $this->faker->randomDigit,
            'cour_id' => $cours->random()->id,
            'created_at' => $created_at ,
            'updated_at' => $created_at ,
        ];
    }
}
