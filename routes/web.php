<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AtollController;
use App\Http\Controllers\IslandController;
use App\Http\Controllers\IslandCategoryController;
use App\Http\Controllers\PopulationEntryController;
use \App\Http\Controllers\ZoneController;
use \App\Http\Controllers\PlotController;
use \App\Http\Controllers\EcosystemController;
use \App\Http\Controllers\CaseReportController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [DashboardController::class, 'home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('atoll', AtollController::class);
    Route::resource('island', IslandController::class);
    Route::resource('island-category', IslandCategoryController::class);
    Route::resource('population-entry', PopulationEntryController::class);

    Route::resource('zone', ZoneController::class);
    Route::resource('plot', PlotController::class);

    Route::delete('/plot/usage/{plotUsage}', [PlotController::class, 'destroyPlotUsage'])->name('plot.usage.destroy');
    Route::post('/plot/{plot}/usage', [PlotController::class, 'addPlotUsage'])->name('plot.usage.create');

    Route::resource('ecosystem', EcosystemController::class);

    Route::resource('case-report', CaseReportController::class);
    Route::post('/plot/{plot}/usage', [PlotController::class, 'addPlotUsage'])->name('plot.usage.create');

    Route::post('/case-report/{caseReport}/link', [CaseReportController::class, 'addCaseLink'])->name('case-report.link.create');
    Route::delete('/case-report/link/{caseReportLink}', [CaseReportController::class, 'destroyCaseLink'])->name('case-report.link.destroy');


});

require __DIR__.'/auth.php';
