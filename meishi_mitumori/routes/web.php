<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CorpController;

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

Route::get('corp', [CorpController::class, 'index'])->name('corp.list');
Route::get('corp/business_cards_list/{corp}', [CorpController::class, 'businessCardsList'])->name('corp.businessCardsList');
Route::get('corp/show/{corp}', [CorpController::class, 'show'])->name('corp.show');
Route::get('corp/add', [CorpController::class, 'add'])->name('corp.add');
Route::post('corp/add', [CorpController::class, 'create']);
Route::get('corp/edit/{corp}', [CorpController::class, 'edit'])->name('corp.edit');
Route::get('corp/delete/{corp}', [CorpController::class, 'delete'])->name('corp.delete');
