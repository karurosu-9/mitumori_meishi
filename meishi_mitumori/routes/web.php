<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CorpController;
use App\Http\Controllers\BusinessCardController;
use App\Http\Controllers\DivisionController;

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
Route::get('corp/business-cards-list/{corp}', [CorpController::class, 'businessCardsList'])->name('corp.businessCardsList');
Route::get('corp/show/{corp}', [CorpController::class, 'show'])->name('corp.show');
Route::get('corp/add', [CorpController::class, 'add'])->name('corp.add');
Route::post('corp/add', [CorpController::class, 'create']);
Route::get('corp/edit/{corp}', [CorpController::class, 'edit'])->name('corp.edit');
Route::get('corp/delete/{corp}', [CorpController::class, 'delete'])->name('corp.delete');

//business-card関係のルーティング
Route::get('business-card/add/{corp}', [BusinessCardController::class, 'add'])->name('business-card.add');
Route::post('business-card/add', [BusinessCardController::class, 'create']);
Route::get('business-card/edit/{businessCard}', [BusinessCardController::class, 'edit'])->name('business-card.edit');
