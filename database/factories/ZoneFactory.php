<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Zone>
 */
class ZoneFactory extends Factory
{
    protected $model = \App\Models\Zone::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $atollId = \App\Models\Atoll::all()->random()->id;
        $islandId = \App\Models\Island::where('atoll_id', $atollId)->get()->random()->id;
        return [
            'atoll_id' => $atollId,
            'island_id' => $islandId,
            'name' => $this->faker->unique()->city,
        ];
    }

}
