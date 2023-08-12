<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CaseReport>
 */
class CaseReportFactory extends Factory
{
    protected $model = \App\Models\CaseReport::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ecosystem = \App\Models\Ecosystem::all()->random();
        $islandId = $ecosystem->island_id;
        $atollId = $ecosystem->atoll_id;

        $island = \App\Models\Island::where('atoll_id', $ecosystem->island_id)->first();

        $islandLatitude = $island->latitude ?? 3.0;
        $islandLongitude = $island->longitude ?? 74.5;

        $latitude = $this->faker->latitude($islandLatitude - 0.1, $islandLatitude + 0.1);
        $longitude = $this->faker->longitude($islandLongitude - 0.1, $islandLongitude + 0.1);


        return [
            'atoll_id' => $atollId,
            'island_id' => $islandId,
            'ecosystem_id' => $ecosystem->id,

            'title' => $this->faker->sentence,
            'statement' => $this->faker->paragraph,

            'latitude' => $latitude,
            'longitude' => $longitude,

            'submitted_by' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,

            'is_verified' => $this->faker->boolean,
        ];
    }

}
