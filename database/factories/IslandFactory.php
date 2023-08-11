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
            'atoll_id' => \App\Models\Atoll::all()->random()->id,
            'island_category_id' => IslandCategory::all()->random()->id,
            'code' => $this->faker->uuid,
            'name' => $this->faker->unique()->city,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];
    }
}
