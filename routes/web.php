<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\AtollController;
use App\Http\Controllers\IslandController;
use App\Http\Controllers\IslandCategoryController;
use App\Http\Controllers\PopulationEntryController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('atoll', AtollController::class);
    Route::resource('island', IslandController::class);
    Route::resource('island-category', IslandCategoryController::class);
    Route::resource('population-entry', PopulationEntryController::class);
});

require __DIR__.'/auth.php';
