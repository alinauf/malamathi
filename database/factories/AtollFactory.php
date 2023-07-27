<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Atoll>
 */
class AtollFactory extends Factory
{
    protected $model = \App\Models\Atoll::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->randomLetter . $this->faker->unique()->randomLetter,
            'name' => $this->faker->unique()->city,
            'is_city' => $this->faker->boolean,
        ];
    }

    public function isCity()
    {
        return $this->state([
                'is_city' => true,
            ]
        );
    }

    public function isNotCity()
    {
        return $this->state([
                'is_city' => false,
            ]
        );
    }
}
