<?php

it('has population entry page', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/population-entry')->assertSee('List of all population entries');

    $response->assertOk();
})->group('population-entry');


it('non admin user cannot access population entry create page', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/population-entry/create');

    expect($response->status())->toBe(403);
})->group('population-entry');

it('admin user can access population entry create page', function () {
    $response = adminLogin()
        ->get('/population-entry/create')->assertSee('Add new population entry');
    expect($response->status())->toBe(200);
})->group('population-entry');

it('can create a a population entry', function () {


    $island = createIsland();

    $populationEntrySL = new \App\SL\PopulationEntrySL();
    $fakeMenCount = fake()->numberBetween(1000, 5000);
    $fakeWomenCount = fake()->numberBetween(1000, 5000);
    $fakeExpatCount = fake()->numberBetween(500, 1000);
    $data = [
        'atoll_id' => $island->atoll_id,
        'island_id' => $island->id,
        'men_count' => $fakeMenCount,
        'women_count' => $fakeWomenCount,
        'expat_count' => $fakeExpatCount,
        'local_count' => ($fakeMenCount + $fakeWomenCount) - $fakeExpatCount,
        'logged_date' => \Carbon\Carbon::now(),
        'description' => 'This is a test description',
    ];

    $response = $populationEntrySL->store($data);

    expect($response['status'])->toBeTrue()
        ->and($response['payload'])->toBe('The population entry has been successfully created');

    $this->assertDatabaseHas('population_entries', [
        'atoll_id' => $island->atoll_id,
        'island_id' => $island->id,
        'men_count' => $fakeMenCount,
        'women_count' => $fakeWomenCount,
        'expat_count' => $fakeExpatCount,
        'local_count' => ($fakeMenCount + $fakeWomenCount) - $fakeExpatCount,
        'total_population' => $fakeMenCount + $fakeWomenCount,
        'logged_date' => \Carbon\Carbon::now(),
        'description' => 'This is a test description',
    ]);

})->group('population-entry');

it('can update a population entry', function () {


    $island = createIsland();

    $populationEntry = \App\Models\PopulationEntry::factory()->create(
        [
            'atoll_id' => $island->atoll_id,
            'island_id' => $island->id,
        ]
    );


    $this->assertDatabaseHas('population_entries', [
        'atoll_id' => $populationEntry->atoll_id,
        'island_id' => $populationEntry->island_id,
        'men_count' => $populationEntry->men_count,
        'women_count' => $populationEntry->women_count,
        'expat_count' => $populationEntry->expat_count,
        'local_count' => $populationEntry->local_count,
        'total_population' => $populationEntry->total_population,
        'logged_date' => $populationEntry->logged_date,
        'description' => $populationEntry->description,
    ]);

    $populationEntrySL = new \App\SL\PopulationEntrySL();

    $fakeMenCount = fake()->numberBetween(1000, 5000);
    $fakeWomenCount = fake()->numberBetween(1000, 5000);
    $fakeExpatCount = fake()->numberBetween(500, 1000);

    $island = createIsland();
    $data = [
        'atoll_id' => $island->atoll_id,
        'island_id' => $island->id,
        'men_count' => $fakeMenCount,
        'women_count' => $fakeWomenCount,
        'expat_count' => $fakeExpatCount,
        'local_count' => ($fakeMenCount + $fakeWomenCount) - $fakeExpatCount,
        'logged_date' => \Carbon\Carbon::now(),
        'description' => 'This is a test description',
    ];


    $response = $populationEntrySL->update($populationEntry->id, $data);

    expect($response['status'])->toBeTrue()
        ->and($response['payload'])->toBe('The population entry has been successfully updated');

    $this->assertDatabaseHas('population_entries', [
        'atoll_id' => $island->atoll_id,
        'island_id' => $island->id,
        'men_count' => $fakeMenCount,
        'women_count' => $fakeWomenCount,
        'expat_count' => $fakeExpatCount,
        'local_count' => ($fakeMenCount + $fakeWomenCount) - $fakeExpatCount,
        'total_population' => $fakeMenCount + $fakeWomenCount,
        'logged_date' => \Carbon\Carbon::now(),
        'description' => 'This is a test description',
    ]);

})->group('population-entry');


