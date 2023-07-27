<?php

namespace Database\Factories;

use App\Models\IslandCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Island>
 */
class IslandFactory extends Factory
{
    protected $model = \App\Models\Island::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'island_category_id' => IslandCategory::all()->random()->id,
            'code' => $this->faker->unique()->randomLetter . $this->faker->unique()->randomLetter,
            'name' => $this->faker->unique()->city,
        ];
    }
}
