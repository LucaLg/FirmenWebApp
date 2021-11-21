<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirmenController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/*
Firmen Routes
*/
Route::get('/firmen', [FirmenController::class, 'index']);
Route::post('/firmen', [FirmenController::class, 'store']);
Route::delete('/firmen/{id}',[FirmenController::class,'destroy']);
Route::get('firmen/{id}',[FirmenController::class,'getWorkers']);

/*
Mitarbeiter Routes
*/
Route::get('/mitarbeiter',[\App\Http\Controllers\MitarbeiterController::class,'index']);
Route::post('/mitarbeiter',[\App\Http\Controllers\MitarbeiterController::class,'store']);
Route::delete('/mitarbeiter/{id}',[\App\Http\Controllers\MitarbeiterController::class,'destroy']);
Route::get('/mitarbeiter/{id}',[\App\Http\Controllers\MitarbeiterController::class,'getFirma']);
