<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', InicioController::class)->name('home');
Route::get("cadastro_contato",[ContatoController::class,"cadastro_contato"])->name("contato.cadastro");
Route::post("cadastramento",[ContatoController::class,"cadastramento_contato"])->name("contato.cadastramento");
Route::get("contatos",[ContatoController::class,"contatos"])->name("buscar.contatos");
Route::get("contato/visualizar/{item}",[ContatoController::class,"visualizacao"])->name("contato.detalhes");
Route::get("contato/edita_contato/{item}",[ContatoController::class,"exibir_edicao"])->name("contato.exibi_edicao");
Route::put("contato/edita/{item}",[ContatoController::class,"edita"])->name("contato.edita");
Route::get("contato/excluir/{item}",[ContatoController::class,"exibir_modal_delecao"])->name("contato.deletar");
Route::delete("contato/exclusao/{item}",[ContatoController::class,"exclusao_contato"])->name("contato.exclusao");