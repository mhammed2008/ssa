<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentList>
 */
class StudentListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'img_url' => '/storage/images/uQInnjB3o2y0kAIlffimmCaVfDSPQiRBwEzjI8wj.jpg',
            'grad' => fake()->randomElement(['k1','k2','1','2','3','4','5','6','7','8','9'])
        ];
    }
}
