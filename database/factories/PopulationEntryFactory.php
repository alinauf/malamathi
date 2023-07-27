<?php

namespace Database\Factories;

use App\Models\Atoll;
use App\Models\Island;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PopulationEntry>
 */
class PopulationEntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $men_count = $this->faker->numberBetween(1000, 5000);
        $women_count = $this->faker->numberBetween(1000, 5000);
        $total_population = $men_count + $women_count;
        $expat_count =  $this->faker->numberBetween(500, 999);
        $local_count = $total_population - $expat_count;

        $logged_date = $this->faker->dateTimeBetween('-1 years', 'now');


        return [
            'atoll_id' => Atoll::all()->random()->id,
            'island_id' => Island::all()->random()->id,
            'men_count' => $men_count,
            'women_count' => $women_count,
            'local_count' => $local_count,
            'expat_count' => $expat_count,
            'total_population' => $total_population,
            'logged_date' => $logged_date,
            'description' => $this->faker->sentence(),
        ];
    }
}
