<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\TipoBrinquedoController;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BrinquedoController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('/brinquedo', [BrinquedoController::class, 'index']);
    Route::post('/brinquedo', [BrinquedoController::class, 'store']);
    Route::put('/brinquedo/{id}', [BrinquedoController::class, 'update']);
    Route::delete('/brinquedo{id}', [BrinquedoController::class, 'destroy']);

    Route::get('/tipo-brinquedo', [TipoBrinquedoController::class, 'index']);
    Route::post('/tipo-brinquedo', [TipoBrinquedoController::class, 'store']);
    Route::put('/tipo-brinquedo/{id}', [TipoBrinquedoController::class, 'update']);
    Route::delete('/tipo-brinquedo/{id}', [TipoBrinquedoController::class, 'destroy']);

    Route::get('/marca', [MarcaController::class, 'index']);
    Route::post('/marca', [MarcaController::class, 'store']);
    Route::put('/marca/{id}', [MarcaController::class, 'update']);
    Route::delete('/marca/{id}', [MarcaController::class, 'destroy']);

    Route::get('/cliente', [ClienteController::class, 'index']);
    Route::post('/cliente', [ClienteController::class, 'store']);
    Route::put('/cliente/{id}', [ClienteController::class, 'update']);
    Route::delete('/cliente/{id}', [ClienteController::class, 'destroy']);
});
