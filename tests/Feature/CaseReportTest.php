<?php

use App\Models\CaseReport;

it('case report page is displayed', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/case-report')->assertSee('List of all case reports');

    $response->assertOk();
})->group('case-report');


it('non admin user cannot access case-report create page', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/case-report/create');

    expect($response->status())->toBe(403);
})->group('case-report');

it('admin user can access case-report create page', function () {
    $response = adminLogin()
        ->get('/case-report/create')->assertSee('Add new Case Report');
    expect($response->status())->toBe(200);
})->group('case-report');

it('can have many links', function () {
    $ecosystem = createEcosystem();

    $caseReport = \App\Models\CaseReport::factory()->create(
        [
            'atoll_id' => $ecosystem->atoll_id,
            'island_id' => $ecosystem->island_id,
            'ecosystem_id' => $ecosystem->id,
        ]
    );
    expect($caseReport->caseReportLinks->count())->toBe(0);

    \App\Models\CaseReportLink::factory()->count(5)->create(
        [
            'case_report_id' => $caseReport->id,
        ]
    );

    $caseReport->refresh();
    expect($caseReport->caseReportLinks->count())->toBe(5);

    $response = adminLogin()
        ->get('/case-report/' . $caseReport->id)->assertSee($caseReport->caseReportLinks[0]->link);
    expect($response->status())->toBe(200);

})->group('case-report');

