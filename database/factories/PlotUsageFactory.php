<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlotUsage>
 */
class PlotUsageFactory extends Factory
{
    protected $model = \App\Models\PlotUsage::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $plotId = \App\Models\Plot::all()->random()->id;

        return [
            'plot_id' => $plotId,
            'owner_name' => $this->faker->name,
            'purpose' => $this->faker->randomElement(['Residential', 'Commercial', 'Industrial']),
            'description' => $this->faker->text,
        ];
    }

}
