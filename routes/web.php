<?php


use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Frontend\AboutController;
use \App\Http\Controllers\Frontend\HomeController;
use \App\Http\Controllers\Frontend\CaseReportController;
use \App\Http\Controllers\Frontend\EcosystemController;

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


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('about-us', [AboutController::class, 'index'])->name('about-us.index');
Route::get('case-reports', [CaseReportController::class, 'index'])->name('case-reports');
Route::get('case-reports/create', [CaseReportController::class, 'create'])->name('case-reports.create');

Route::get('case-reports/{caseReport}', [CaseReportController::class, 'show'])->name('case-reports.show');
Route::get('ecosystems', [EcosystemController::class, 'index'])->name('ecosystems');

Route::get('case-report/thank-you', [CaseReportController::class, 'guestThanks'])->name('case-reports.thank-you');
Route::post('case-report/submission', [CaseReportController::class, 'guestStore'])->name('case-reports.submission');



require __DIR__ . '/backend-routes.php';

Route::mediaLibrary();
