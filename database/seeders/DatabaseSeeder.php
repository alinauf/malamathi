<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Atoll;
use App\Models\CaseReport;
use App\Models\CaseReportLink;
use App\Models\Ecosystem;
use App\Models\Island;
use App\Models\IslandCategory;
use App\Models\Plot;
use App\Models\PlotUsage;
use App\Models\PopulationEntry;
use App\Models\Zone;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@malamathi.org',
            'password' => bcrypt('Test@123'),
        ]);


        $this->call(PermissionSeeder::class);
        $user->assignRole('admin');

        $islandCategories = [
            'Inhabited',
            'Uninhabited',
            'Resort',
            'Varuvaa',
            'Government',
            'Other',
        ];

        foreach ($islandCategories as $islandCategory) {
            IslandCategory::create([
                'name' => $islandCategory,
            ]);
        }

        // Seed Atoll and Islands
        $this->call(AtollSeeder::class);



        // TODO: remove below code after proper data is seeded

        PopulationEntry::factory()->count(1000)->create();
        Zone::factory()->count(10)->create();
        Plot::factory()->count(30)->create();
        PlotUsage::factory()->count(100)->create();

        Ecosystem::factory()->count(10)->create();

        CaseReport::factory()->count(50)->create();
        CaseReportLink::factory()->count(100)->create();


    }
}
