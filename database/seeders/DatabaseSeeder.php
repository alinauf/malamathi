<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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


    }
}
