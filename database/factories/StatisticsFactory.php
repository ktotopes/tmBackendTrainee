<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\statistics>
 */
class StatisticsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'views'      => $this->faker->numberBetween(0, 1000),
            'clicks'     => $this->faker->numberBetween(0, 1000),
            'cost'       => $this->faker->randomFloat(2, 1, 100),
            'created_at' => $this->faker->date('y-m-d'),
            'updated_at' => $this->faker->date('y-m-d'),
        ];
    }
}
