<?php

use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\PapeisController;
use App\Http\Controllers\PermissaoController;
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
    Route::get('/brinquedos/filtros', [BrinquedoController::class, 'filter']);
    Route::get('/brinquedos/{id}', [BrinquedoController::class, 'show']);
    Route::put('/brinquedos/{id}', [BrinquedoController::class, 'update']);
    Route::delete('/brinquedos{id}', [BrinquedoController::class, 'destroy']);

    Route::get('/tipo-brinquedos', [TipoBrinquedoController::class, 'index']);
    Route::post('/tipo-brinquedos', [TipoBrinquedoController::class, 'store']);
    Route::get('/tipo-brinquedos/{id}', [TipoBrinquedoController::class, 'show']);
    Route::put('/tipo-brinquedos/{id}', [TipoBrinquedoController::class, 'update']);
    Route::delete('/tipo-brinquedos/{id}', [TipoBrinquedoController::class, 'destroy']);

    Route::get('/marcas', [MarcaController::class, 'index']);
    Route::post('/marcas', [MarcaController::class, 'store']);
    Route::get('/marcas/{id}', [MarcaController::class, 'show']);
    Route::put('/marcas/{id}', [MarcaController::class, 'update']);
    Route::delete('/marcas/{id}', [MarcaController::class, 'destroy']);

    Route::get('/clientes', [ClienteController::class, 'index']);
    Route::post('/clientes', [ClienteController::class, 'store']);
    Route::get('/clientes/{id}', [ClienteController::class, 'show']);
    Route::put('/clientes/{id}', [ClienteController::class, 'update']);
    Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);

    Route::get('/pagamentos', [PagamentoController::class, 'index']);
    Route::post('/pagamentos', [PagamentoController::class, 'store']);
    Route::get('/pagamentos/{id}', [PagamentoController::class, 'show']);
    Route::put('/pagamentos/{id}', [PagamentoController::class, 'update']);
    Route::delete('/pagamentos/{id}', [PagamentoController::class, 'destroy']);

    Route::get('/papeis', [PapeisController::class, 'index']);
    Route::post('/papeis', [PapeisController::class, 'store']);
    Route::get('/papeis/{id}', [PapeisController::class, 'show']);
    Route::put('/papeis/{id}', [PapeisController::class, 'update']);
    Route::delete('/papeis/{id}', [PapeisController::class, 'destroy']);

    Route::get('/permissoes', [PermissaoController::class, 'index']);
    Route::post('/permissoes', [PermissaoController::class, 'store']);
    Route::get('/permissoes/{id}', [PermissaoController::class, 'show']);
    Route::put('/permissoes/{id}', [PermissaoController::class, 'update']);
    Route::delete('/permissoes/{id}', [PermissaoController::class, 'destroy']);

    Route::get('/usuarios', [UsuariosController::class, 'index']);
    Route::post('/usuarios', [UsuariosController::class, 'store']);
    Route::get('/usuarios/{id}', [UsuariosController::class, 'show']);
    Route::put('/usuarios/{id}', [UsuariosController::class, 'update']);
    Route::delete('/usuarios/{id}', [UsuariosController::class, 'destroy']);

    Route::get('/locacoes', [LocacaoController::class, 'index']);
    Route::post('/locacoes', [LocacaoController::class, 'store']);
    Route::get('/locacoes/{id}', [LocacaoController::class, 'show']);
    Route::put('/locacoes/{id}', [LocacaoController::class, 'update']);
    Route::delete('/locacoes/{id}', [LocacaoController::class, 'destroy']);
});
