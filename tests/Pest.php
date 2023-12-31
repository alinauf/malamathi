<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

uses(
    Tests\TestCase::class,
    Illuminate\Foundation\Testing\RefreshDatabase::class,
)->in('Feature', 'Unit');


/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function something()
{
    // ..
}

function seedPermissions()
{
    $permissionSeeder = new \Database\Seeders\PermissionSeeder();
    $permissionSeeder->run();
}

function adminLogin()
{
    seedPermissions();
    $user = \App\Models\User::factory(
        [
            'name' => 'Admin',
            'email' => 'admin@malamathi.org',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]
    )->create();

    $user->assignRole('admin');

    return test()->actingAs($user);
}

function createAtoll()
{
    return \App\Models\Atoll::factory()->create();
}

function createIsland()
{
    $atoll = createAtoll();
    $islandCategory = createIslandCategory();
    return \App\Models\Island::factory()->create(
        [
            'atoll_id' => $atoll->id,
            'island_category_id' => $islandCategory->id,
        ]
    );
}

function createZone()
{

    $island = createIsland();
    return \App\Models\Zone::factory()->create(
        [
            'atoll_id' => $island->atoll_id,
            'island_id' => $island->id,
        ]
    );
}

function createEcosystem()
{

    $island = createIsland();
    return \App\Models\Ecosystem::factory()->create(
        [
            'atoll_id' => $island->atoll_id,
            'island_id' => $island->id,
        ]
    );
}


function createIslandCategory()
{
    return \App\Models\IslandCategory::factory()->create();
}
