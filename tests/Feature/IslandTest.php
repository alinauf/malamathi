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


    $island = new \App\Models\Island();
    $island->atoll_id = $atoll->id;
    $island->island_category_id = $islandCategory->id;
    $island->code = 'S';
    $island->name = 'Hulhudhoo';
    $island->save();

    $this->assertDatabaseHas('islands', [
        'atoll_id' => $atoll->id,
        'island_category_id' => $islandCategory->id,
        'code' => 'S',
        'name' => 'Hulhudhoo',
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


