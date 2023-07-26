<?php

it('island category page is displayed', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/island-category')->assertSee('List of all island categories');

    $response->assertOk();
})->group('island-category');


it('non admin user cannot access island category create page', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/island/create');

    expect($response->status())->toBe(403);
})->group('island-category');

it('admin user can access island category create page', function () {
    $response = adminLogin()
        ->get('/island-category/create')->assertSee('Add new Island Category');
    expect($response->status())->toBe(200);
})->group('island-category');

it('can create an island category', function () {


    $islandCategorySL = new \App\SL\IslandCategorySL();
    $data = [
        'name' => 'Resort',
    ];

    $response = $islandCategorySL->store($data);

    expect($response['status'])->toBeTrue()
        ->and($response['payload'])->toBe('The island category has been successfully created');

    $this->assertDatabaseHas('island_categories', [
        'name' => 'Resort',
    ]);

})->group('island-category');

it('can update an island', function () {

    $atoll = createAtoll();
    $islandCategory = createIslandCategory();


    $island = new \App\Models\IslandCategory();
    $island->name = 'Resort';
    $island->save();

    $this->assertDatabaseHas('island_categories', [
        'name' => 'Resort',
    ]);

    $islandCategorySL = new \App\SL\IslandCategorySL();
    $data = [
        'name' => 'Government',
    ];

    $response = $islandCategorySL->update($island->id, $data);

    expect($response['status'])->toBeTrue()
        ->and($response['payload'])->toBe('The island category has been successfully updated');

    $this->assertDatabaseHas('island_categories', [
        'name' => 'Government',
    ]);

})->group('island-category');


