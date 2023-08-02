<?php

it('zone page is displayed', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/zone')->assertSee('List of all zones');

    $response->assertOk();
})->group('zone');


it('non admin user cannot access zone create page', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/zone/create');

    expect($response->status())->toBe(403);
})->group('zone');

it('admin user can access zone create page', function () {
    $response = adminLogin()
        ->get('/zone/create')->assertSee('Add new Zone');
    expect($response->status())->toBe(200);
})->group('zone');

it('can create an zone', function () {

    $island = createIsland();


    $zoneSL = new \App\SL\ZoneSL();
    $data = [
        'atoll_id' => $island->atoll_id,
        'island_id' => $island->id,
        'name' => 'Hulhudhoo',
    ];

    $response = $zoneSL->store($data);

    expect($response['status'])->toBeTrue()
        ->and($response['payload'])->toBe('The zone has been successfully created');

    $this->assertDatabaseHas('zones', [
        'atoll_id' => $island->atoll_id,
        'island_id' => $island->id,
        'name' => 'Hulhudhoo',
    ]);

})->group('zone');

it('can update an zone', function () {


    $island = createIsland();

    $zone = \App\Models\Zone::factory()->create(
        [
            'atoll_id' => $island->atoll_id,
            'island_id' => $island->id,
        ]
    );


    $this->assertDatabaseHas('zones', [
        'atoll_id' => $zone->atoll_id,
        'island_id' => $zone->island_id,
        'name' => $zone->name,
    ]);

    $zoneSL = new \App\SL\ZoneSL();
    $data = [
        'atoll_id' => $island->atoll_id,
        'island_id' => $island->id,
        'name' => 'Hulhudhoo Zone',
    ];

    $response = $zoneSL->update($zone->id, $data);

    expect($response['status'])->toBeTrue()
        ->and($response['payload'])->toBe('The zone has been successfully updated');

    $this->assertDatabaseHas('zones', [
        'atoll_id' => $island->atoll_id,
        'island_id' => $island->id,
        'name' => 'Hulhudhoo Zone',
    ]);

})->group('zone');


