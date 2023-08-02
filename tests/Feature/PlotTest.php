<?php

it('plot page is displayed', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/plot')->assertSee('List of all plots');

    $response->assertOk();
})->group('plot');


it('non admin user cannot access plot create page', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/plot/create');

    expect($response->status())->toBe(403);
})->group('plot');

it('admin user can access plot create page', function () {
    $response = adminLogin()
        ->get('/plot/create')->assertSee('Add new Plot');
    expect($response->status())->toBe(200);
})->group('plot');

it('can create an plot', function () {

    $zone = createZone();


    $plotSL = new \App\SL\PlotSL();

    $sentence = fake()->sentence;
    $data = [
        'zone_id' => $zone->id,
        'name' => 'Hulhudhoo',
        'description' => $sentence,
    ];

    $response = $plotSL->store($data);

    expect($response['status'])->toBeTrue()
        ->and($response['payload'])->toBe('The plot has been successfully created');

    $this->assertDatabaseHas('plots', [
        'zone_id' => $zone->id,
        'name' => 'Hulhudhoo',
        'description' => $sentence,
    ]);

})->group('plot');

it('can update an plot', function () {


    $zone = createZone();

    $plot = \App\Models\Plot::factory()->create(
        [
            'zone_id' => $zone->id,
        ]
    );


    $this->assertDatabaseHas('plots', [
        'zone_id' => $plot->zone_id,
        'name' => $plot->name,
        'description' => $plot->description,

    ]);

    $plotSL = new \App\SL\PlotSL();
    $data = [
        'zone_id' => $zone->id,
        'name' => 'Hulhudhoo Plot',
        'description' => 'Hulhudhoo Plot Description',
    ];

    $response = $plotSL->update($plot->id, $data);

    expect($response['status'])->toBeTrue()
        ->and($response['payload'])->toBe('The plot has been successfully updated');

    $this->assertDatabaseHas('plots', [
        'zone_id' => $zone->id,
        'name' => 'Hulhudhoo Plot',
        'description' => 'Hulhudhoo Plot Description',
    ]);

})->group('plot');


