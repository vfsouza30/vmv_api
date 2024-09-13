<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadsController;
/*use App\Http\Controllers\ReservaController;
use App\Http\Controllers\LeadsVisitaController;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\CorretoresController;
use App\Http\Controllers\UnidadesController;
use App\Http\Controllers\PessoasController;
use App\Http\Controllers\DistratosController;
use App\Http\Controllers\AtendimentosController;
use App\Http\Controllers\LeadsHistoricoSituacoesController;
use App\Http\Controllers\ComissoesController;
use App\Http\Controllers\LeadsInteracoesController;
use App\Http\Controllers\CamposAdicionaisController;
use App\Http\Controllers\ReservasFlagController;
use App\Http\Controllers\AssistenciasController;
use App\Http\Controllers\LeadConversoesController;
use App\Http\Controllers\LeadTarefasController;
use App\Http\Controllers\ImobiliariasController;
use App\Http\Controllers\PreCadastroController;
use App\Http\Controllers\RepasseController;*/

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

Route::get('/leads', [LeadsController::class, 'fetchAndSave']);
/*Route::get('/reservas', [ReservaController::class, 'fetchAndSave']);
Route::get('/leads-vista', [LeadsVisitaController::class, 'fetchAndSave']);
Route::get('/vendas', [VendasController::class, 'fetchAndSave']);
Route::get('/corretores', [CorretoresController::class, 'fetchAndSave']);
Route::get('/unidades', [UnidadesController::class, 'fetchAndSave']);
Route::get('/pessoas', [PessoasController::class, 'fetchAndSave']);
Route::get('/distratos', [DistratosController::class, 'fetchAndSave']);
Route::get('/atendimentos', [AtendimentosController::class, 'fetchAndSave']);
Route::get('/leads-historico-situacoes', [LeadsHistoricoSituacoesController::class, 'fetchAndSave']);
Route::get('/comissoes', [ComissoesController::class, 'fetchAndSave']);
Route::get('/leads-interacoes', [LeadsInteracoesController::class, 'fetchAndSave']);
Route::get('/campos-adicionais', [CamposAdicionaisController::class, 'fetchAndSave']);
Route::get('/reservas-flag', [ReservasFlagController::class, 'fetchAndSave']);
Route::get('/assistencias', [AssistenciasController::class, 'fetchAndSave']);
Route::get('/leads-conversoes', [LeadsConversoesController::class, 'fetchAndSave']);
Route::get('/leads-tarefas', [LeadsTarefasController::class, 'fetchAndSave']);
Route::get('/imobiliarias', [ImobiliariasController::class, 'fetchAndSave']);
Route::get('/pre-cadastro', [PreCadastroController::class, 'fetchAndSave']);
Route::get('/repasse', [RepasseController::class, 'fetchAndSave']);*/