<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CorpController;
use App\Http\Controllers\BusinessCardController;
use App\Http\Controllers\EstimateController;
use App\Models\Estimate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//corp関係のルーティング
Route::get('corp', [CorpController::class, 'index'])->name('corp.list');
Route::get('corp/{corp}/show', [CorpController::class, 'show'])->name('corp.show');
Route::get('corp/add', [CorpController::class, 'add'])->name('corp.add');
Route::post('corp/add', [CorpController::class, 'create']);
Route::get('corp/{corp}/edit', [CorpController::class, 'edit'])->name('corp.edit');
Route::put('corp/{corp}/edit', [CorpController::class, 'update']);
Route::get('corp/{corp}/delete', [CorpController::class, 'delete'])->name('corp.delete');

//business-card関係のルーティング
Route::get('corp/{corp}/business-card/index', [BusinessCardController::class, 'index'])->name('business-card.corpBusinessCardsList');
Route::get('corp/{corp}/business-card/{businessCard}/show', [BusinessCardController::class, 'show'])->name('business-card.show');
Route::get('corp/{corp}/business-card/add', [BusinessCardController::class, 'add'])->name('business-card.add');
Route::post('corp/{corp}/business-card/add', [BusinessCardController::class, 'create']);
Route::get('corp/{corp}/business-card/{businessCard}/edit', [BusinessCardController::class, 'edit'])->name('business-card.edit');
Route::post('corp/{corp}/business-card/{businessCard}/edit', [BusinessCArdController::class, 'update']);
Route::get('corp/{corp}/business-card/{businessCard}/delete', [BusinessCardController::class, 'delete'])->name('business-card.delete');

//estimate関係のルーティング
Route::get('corp/{corp}/estimate/index', [EstimateController::class, 'index'])->name('estimate.corpEstimatesList');
Route::get('corp/{corp}/estimate/{estimate}/show', [EstimateController::class, 'show'])->name('estimate.show');
Route::get('corp/{corp}/estimate/add', [EstimateController::class, 'add'])->name('estimate.add');
Route::post('corp/{corp}/estimate/confirmEstimate', [EstimateController::class, 'confirmEstimate'])->name('estimate.addConfirmEstimate');
Route::get('corp/{corp}/estimate/{estimate}/edit', [EstimateController::class, 'edit'])->name('estimate.edit');
Route::put('corp/{corp}/estimate/{estimate}/confirmEstimate', [EstimateController::class, 'confirmEstimate'])->name('estimate.editConfirmEstimate');
Route::get('corp/{corp}/estimate/confirmEstimate', [EstimateController::class, 'create'])->name('estimate.createEstimate');
Route::get('corp/{corp}/estimate/{estimate}/delete', [EstimateController::class, 'delete'])->name('estimate.delete');
