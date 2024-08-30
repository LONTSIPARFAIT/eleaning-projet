<?php

namespace Database\Factories;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exercise>
 */
class ExerciseFactory extends Factory
{
    protected $model = Exercise::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $created_at = $this->faker->dateTimeBetween('-1 years');
        return [
            'title' => $this->faker->unique()->sentence,
            'content' => $this->faker->paragraphs(asText: true),
            'duration' => $this->faker->numberBetween(1, 120), // Durée réaliste
            'cour_id' => $this->faker->numberBetween(1, 10), // ID d'un cours aléatoire, ajustez selon vos données
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}