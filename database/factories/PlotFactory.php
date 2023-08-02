<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plot>
 */
class PlotFactory extends Factory
{
    protected $model = \App\Models\Plot::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $zoneId = \App\Models\Zone::all()->random()->id;

        return [
            'zone_id' => $zoneId,
            'name' => $this->faker->sentence,
            'description' => $this->faker->text,
        ];
    }

}
