<?php

use App\Http\Controllers\API\equipesController;
use App\Models\equipes;
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

Route::get('/equipes', [equipesController::class, 'index']);
Route::post('/equipes', [equipesController::class, 'store']);
Route::get('/equipes/{id}', [equipesController::class, 'edit']);
Route::put('/equipes/{id}', [equipesController::class, 'update']);
Route::delete('/equipes/{id}', [equipesController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
