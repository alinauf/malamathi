<?php

it('atoll page is displayed', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/atoll')->assertSee('List of all atolls');

    $response->assertOk();
})->group('atoll');


it('non admin user cannot access atoll create page', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/atoll/create');

    expect($response->status())->toBe(403);
})->group('atoll');

it('admin user can access atoll create page', function () {
    $response = adminLogin()
        ->get('/atoll/create')->assertSee('Add new Atoll');
    expect($response->status())->toBe(200);
})->group('atoll');

it('can create an atoll', function () {

    $atollSL = new \App\SL\AtollSL();
    $data = [
        'code' => 'S',
        'name' => 'Addu',
        'is_city' => true,
    ];

    $response = $atollSL->store($data);

    expect($response['status'])->toBeTrue()
        ->and($response['payload'])->toBe('The atoll has been successfully created');

    $this->assertDatabaseHas('atolls', [
        'code' => 'S',
        'name' => 'Addu',
        'is_city' => true,
    ]);

})->group('atoll');

it('can update an atoll', function () {

    $atoll = \App\Models\Atoll::factory()->create();

    $this->assertDatabaseHas('atolls', [
        'code' => $atoll->code,
        'name' => $atoll->name,
        'is_city' => $atoll->is_city,
    ]);

    $atollSL = new \App\SL\AtollSL();
    $data = [
        'code' => 'S.',
        'name' => 'Addu Atoll',
        'is_city' => true,
    ];

    $response = $atollSL->update($atoll->id, $data);

    expect($response['status'])->toBeTrue()
        ->and($response['payload'])->toBe('The atoll has been successfully updated');

    $this->assertDatabaseHas('atolls', [
        'code' => 'S.',
        'name' => 'Addu Atoll',
        'is_city' => true,
    ]);

})->group('atoll');


