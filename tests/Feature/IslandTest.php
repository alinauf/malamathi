<?php

it('island page is displayed', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/island')->assertSee('List of all islands');

    $response->assertOk();
})->group('island');


it('non admin user cannot access island create page', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/island/create');

    expect($response->status())->toBe(403);
})->group('island');

it('admin user can access island create page', function () {
    $response = adminLogin()
        ->get('/island/create')->assertSee('Add new Island');
    expect($response->status())->toBe(200);
})->group('island');

it('can create an island', function () {

    $atoll = createAtoll();
    $islandCategory = createIslandCategory();

    $islandSL = new \App\SL\IslandSL();
    $data = [
        'atoll_id' => $atoll->id,
        'island_category_id' => $islandCategory->id,
        'code' => 'S',
        'name' => 'Hulhudhoo',
    ];

    $response = $islandSL->store($data);

    expect($response['status'])->toBeTrue()
        ->and($response['payload'])->toBe('The island has been successfully created');

    $this->assertDatabaseHas('islands', [
        'atoll_id' => $atoll->id,
        'island_category_id' => $islandCategory->id,
        'code' => 'S',
        'name' => 'Hulhudhoo',
    ]);

})->group('island');

it('can update an island', function () {

    $atoll = createAtoll();
    $islandCategory = createIslandCategory();

    $island = \App\Models\Island::factory()->create(
        [
            'atoll_id' => $atoll->id,
            'island_category_id' => $islandCategory->id,
        ]
    );


    $this->assertDatabaseHas('islands', [
        'atoll_id' => $island->atoll_id,
        'island_category_id' => $island->island_category_id,
        'code' => $island->code,
        'name' => $island->name,
    ]);

    $islandSL = new \App\SL\IslandSL();
    $data = [
        'atoll_id' => $atoll->id,
        'island_category_id' => $islandCategory->id,
        'code' => 'S.',
        'name' => 'Hulhudhoo Island',
    ];

    $response = $islandSL->update($island->id, $data);

    expect($response['status'])->toBeTrue()
        ->and($response['payload'])->toBe('The island has been successfully updated');

    $this->assertDatabaseHas('islands', [
        'atoll_id' => $atoll->id,
        'island_category_id' => $islandCategory->id,
        'code' => 'S.',
        'name' => 'Hulhudhoo Island',
    ]);

})->group('island');

it('can update an island latitude and longitude', function () {

    $atoll = createAtoll();
    $islandCategory = createIslandCategory();

    $island = \App\Models\Island::factory()->create(
        [
            'atoll_id' => $atoll->id,
            'island_category_id' => $islandCategory->id,
        ]
    );


    $this->assertDatabaseHas('islands', [
        'atoll_id' => $island->atoll_id,
        'island_category_id' => $island->island_category_id,
        'code' => $island->code,
        'name' => $island->name,
    ]);

    $latitude = fake()->latitude;
    $longitude = fake()->longitude;

    $islandSL = new \App\SL\IslandSL();
    $data = [
        'latitude' => $latitude,
        'longitude' => $longitude
    ];

    $response = $islandSL->update($island->id, $data);

    expect($response['status'])->toBeTrue()
        ->and($response['payload'])->toBe('The island has been successfully updated');

    $this->assertDatabaseHas('islands', [
        'atoll_id' => $atoll->id,
        'island_category_id' => $islandCategory->id,
        'code' => $island->code,
        'name' => $island->name,
        'latitude' => $latitude,
        'longitude' => $longitude
    ]);

})->group('island');



