<?php

it('ecosystem page is displayed', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/ecosystem')->assertSee('List of all ecosystems');

    $response->assertOk();
})->group('ecosystem');


it('non admin user cannot access ecosystem create page', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/ecosystem/create');

    expect($response->status())->toBe(403);
})->group('ecosystem');

it('admin user can access ecosystem create page', function () {
    $response = adminLogin()
        ->get('/ecosystem/create')->assertSee('Add new Ecosystem');
    expect($response->status())->toBe(200);
})->group('ecosystem');

it('can create an ecosystem', function () {

    $island = createIsland();
    $ecosystemSL = new \App\SL\EcosystemSL();
    $data = [
        'atoll_id' => $island->atoll_id,
        'island_id' => $island->id,
        'name' => 'Addu Ecosystem',
        'description' => 'Addu Ecosystem Description',
        'is_documented' => true,
        'is_potentially_threatened' => true,
        'is_threatened' => false,
        'is_destroyed' => false,
        'latitude' => 0.0,
        'longitude' => 0.0,
    ];

    $response = $ecosystemSL->store($data);

    expect($response['status'])->toBeTrue()
        ->and($response['payload'])->toBe('The ecosystem has been successfully created');

    $assertData = [
        'atoll_id' => $island->atoll_id,
        'island_id' => $island->id,
        'name' => 'Addu Ecosystem',
        'description' => 'Addu Ecosystem Description',
        'is_documented' => 1,
        'is_potentially_threatened' => 1,
        'is_threatened' => 0,
        'is_destroyed' => 0,
        'latitude' => 0.0,
        'longitude' => 0.0,
    ];

    $this->assertDatabaseHas('ecosystems', $assertData);

})->group('ecosystem');

it('can update an ecosystem', function () {

    $island = createIsland();

    $ecosystem = \App\Models\Ecosystem::factory()->create();

    $this->assertDatabaseHas('ecosystems', [
        'atoll_id' => $ecosystem->atoll_id,
        'island_id' => $ecosystem->island_id,
        'name' => $ecosystem->name,
        'description' => $ecosystem->description,
        'is_documented' => $ecosystem->is_documented,
        'is_potentially_threatened' => $ecosystem->is_potentially_threatened,
        'is_threatened' => $ecosystem->is_threatened,
        'is_destroyed' => $ecosystem->is_destroyed,
        'latitude' => $ecosystem->latitude,
        'longitude' => $ecosystem->longitude,
    ]);

    $ecosystemSL = new \App\SL\EcosystemSL();
    $data = [
        'atoll_id' => $ecosystem->atoll_id,
        'island_id' => $ecosystem->island_id,
        'name' => 'Addu Ecosystem Update',
        'description' => 'Addu Ecosystem Description Update',
        'is_documented' => true ? 1 : 0,
        'is_potentially_threatened' => true ? 1 : 0,
        'is_threatened' => false ? 1 : 0,
        'is_destroyed' => false ? 1 : 0,
        'latitude' => 0.0,
        'longitude' => 0.0,
    ];

    $response = $ecosystemSL->update($ecosystem->id, $data);

    expect($response['status'])->toBeTrue()
        ->and($response['payload'])->toBe('The ecosystem has been successfully updated');

    $this->assertDatabaseHas('ecosystems', [
        'atoll_id' => $ecosystem->atoll_id,
        'island_id' => $ecosystem->island_id,
        'name' => 'Addu Ecosystem Update',
        'description' => 'Addu Ecosystem Description Update',
        'is_documented' => true ? 1 : 0,
        'is_potentially_threatened' => true ? 1 : 0,
        'is_threatened' => false ? 1 : 0,
        'is_destroyed' => false ? 1 : 0,
        'latitude' => 0.0,
        'longitude' => 0.0,
    ]);

})->group('ecosystem');


