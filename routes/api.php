<?php

use App\Http\Controllers\Api\UsuariosController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\TipoBrinquedoController;
use App\Http\Controllers\LocacaoController;
use App\Http\Controllers\BrinquedoController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



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
    Route::get('/brinquedos', [BrinquedoController::class, 'index']);
    Route::post('/brinquedos', [BrinquedoController::class, 'store']);
    Route::put('/brinquedos/{id}', [BrinquedoController::class, 'update']);
    Route::delete('/brinquedos{id}', [BrinquedoController::class, 'destroy']);

    Route::get('/tipo-brinquedos', [TipoBrinquedoController::class, 'index']);
    Route::post('/tipo-brinquedos', [TipoBrinquedoController::class, 'store']);
    Route::put('/tipo-brinquedos/{id}', [TipoBrinquedoController::class, 'update']);
    Route::delete('/tipo-brinquedos/{id}', [TipoBrinquedoController::class, 'destroy']);

    Route::get('/marcas', [MarcaController::class, 'index']);
    Route::post('/marcas', [MarcaController::class, 'store']);
    Route::put('/marcas/{id}', [MarcaController::class, 'update']);
    Route::delete('/marcas/{id}', [MarcaController::class, 'destroy']);

    Route::get('/clientes', [ClienteController::class, 'index']);
    Route::post('/clientes', [ClienteController::class, 'store']);
    Route::put('/clientes/{id}', [ClienteController::class, 'update']);
    Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);

    Route::get('/usuarios', [UsuariosController::class, 'index']);
    Route::post('/usuarios', [UsuariosController::class, 'store']);
    Route::put('/usuarios/{id}', [UsuariosController::class, 'update']);
    Route::delete('/usuarios/{id}', [UsuariosController::class, 'destroy']);

    Route::get('/locacoes', [LocacaoController::class, 'index']);
    Route::post('/locacoes', [LocacaoController::class, 'store']);
    Route::put('/locacoes/{id}', [LocacaoController::class, 'update']);
    Route::delete('/locacoes/{id}', [LocacaoController::class, 'destroy']);
});
