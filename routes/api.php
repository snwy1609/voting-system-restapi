<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::resource('/candidate', \App\Http\Controllers\CandidateController::class);
Route::get('/candidate/position/{id}', [\App\Http\Controllers\CandidateController::class, 'createCandidate'])->name('candidate.create_candidate');
Route::get('/candidate/position/{id}/edit', [\App\Http\Controllers\CandidateController::class, 'editPosition'])->name('candidate.edit_position');
Route::post('/candidate/store', [\App\Http\Controllers\CandidateController::class, 'storeCandidate'])->name('candidate.store_candidate');
Route::post('/candidate/position/{id}', [\App\Http\Controllers\CandidateController::class, 'updatePosition'])->name('candidate.update_position');
Route::delete('/candidate/position/{id}', [\App\Http\Controllers\CandidateController::class, 'destroyPosition'])->name('candidate.destroy_position');

Route::resource('/partylist', \App\Http\Controllers\PartyListController::class);

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
