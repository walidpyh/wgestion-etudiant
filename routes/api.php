<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EtudiantController;

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


Route::get('/etudiants', [EtudiantController::class, 'index']);
Route::get('/etudiants/{id}', [EtudiantController::class, 'show']);
Route::post('/etudiants', [EtudiantController::class, 'store']);
Route::put('/etudiants/{id}', [EtudiantController::class, 'update']);
Route::delete('/etudiants/{id}', [EtudiantController::class, 'destroy']);