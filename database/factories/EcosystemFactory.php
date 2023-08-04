<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ecosystem>
 */
class EcosystemFactory extends Factory
{
    protected $model = \App\Models\Ecosystem::class;

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
            'name' => $this->faker->word(),
            'description' => $this->faker->text,
            'is_documented' => $this->faker->boolean,
            'is_potentially_threatened' => $this->faker->boolean,
            'is_threatened' => $this->faker->boolean,
            'is_destroyed' => $this->faker->boolean,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];
    }

    public function isDocumented()
    {
        return $this->state([
                'is_documented' => true,
            ]
        );
    }

    public function isNotDocumented()
    {
        return $this->state([
                'is_documented' => false,
            ]
        );
    }

    public function isPotentiallyThreatened()
    {
        return $this->state([
                'is_potentially_threatened' => true,
            ]
        );
    }

    public function isNotPotentiallyThreatened()
    {
        return $this->state([
                'is_potentially_threatened' => false,
            ]
        );
    }

    public function isThreatened()
    {
        return $this->state([
                'is_threatened' => true,
            ]
        );
    }

    public function isNotThreatened()
    {
        return $this->state([
                'is_threatened' => false,
            ]
        );
    }

}
