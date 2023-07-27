<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Atoll;
use App\Models\Island;
use App\Models\IslandCategory;
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


        // TODO: remove below code after proper data is seeded

        Atoll::factory()->count(10)->create();

        IslandCategory::factory()->count(10)->create();

        Island::factory()->count(100)->create();



    }
}
