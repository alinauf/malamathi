<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CaseReportLink>
 */
class CaseReportLinkFactory extends Factory
{
    protected $model = \App\Models\CaseReportLink::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $caseReportId = \App\Models\CaseReport::all()->random()->id;

        return [
            'case_report_id' => $caseReportId,
            'link' => $this->faker->url,
            'description' => $this->faker->text,
        ];
    }

}
