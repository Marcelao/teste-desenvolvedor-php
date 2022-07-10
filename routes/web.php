<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('login');
});*/

Route::get('/', [App\Http\Controllers\AutenticacaoController::class, 'login'])->name('login');
Route::get('/esqueci', [App\Http\Controllers\AutenticacaoController::class, 'esqueci'])->name('esqueci');
Route::get('/registrar', [App\Http\Controllers\AutenticacaoController::class, 'registrar'])->name('registrar');
Route::post('/recuperar', [App\Http\Controllers\AutenticacaoController::class, 'recuperar'])->name('recuperar');
Route::post('/salvar', [App\Http\Controllers\AutenticacaoController::class, 'salvar'])->name('salvar');
Route::post('/logar', [App\Http\Controllers\AutenticacaoController::class, 'logar'])->name('logar');
Route::get('/logout', [App\Http\Controllers\AutenticacaoController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'privada'])->name('dashboard');

    /* ---------------------------------------- Gateway -------------------------------------------- */

    Route::get('/gateway', [App\Http\Controllers\GatewayController::class, 'index'])->name('gateway');
    Route::get('/novo_gateways', [App\Http\Controllers\GatewayController::class, 'novo'])->name('novo_gateways');
    Route::post('/salvar_gateways', [App\Http\Controllers\GatewayController::class, 'salvar'])->name('salvar_gateways');
    Route::get('/editar_gateways/{id}', [App\Http\Controllers\GatewayController::class, 'editar'])->name('editar_gateways');
    Route::post('/atualizar_gateways', [App\Http\Controllers\GatewayController::class, 'atualizar'])->name('atualizar_gateways');
    Route::get('/deletar_gateways/{id}', [App\Http\Controllers\GatewayController::class, 'deletar'])->name('deletar_gateways');

    /* ------------------------------------- Lista Gateways ----------------------------------------- */

    Route::get('/loja_gateway', [App\Http\Controllers\LojaGatewayController::class, 'index'])->name('loja_gateway');
    Route::get('/novo_lojagateways', [App\Http\Controllers\LojaGatewayController::class, 'novo'])->name('novo_lojagateways');
    Route::post('/salvar_lojagateways', [App\Http\Controllers\LojaGatewayController::class, 'salvar'])->name('salvar_lojagateways');
    Route::get('/editar_lojagateways/{id}', [App\Http\Controllers\LojaGatewayController::class, 'editar'])->name('editar_lojagateways');
    Route::post('/atualizar_lojagateways', [App\Http\Controllers\LojaGatewayController::class, 'atualizar'])->name('atualizar_lojagateways');
    Route::get('/deletar_lojagateways/{id}', [App\Http\Controllers\LojaGatewayController::class, 'deletar'])->name('deletar_lojagateways');


    /* -------------------------------------- Formas de Pagamento -------------------------------------- */

    Route::get('/formas_pagamento', [App\Http\Controllers\FormasPagamentoController::class, 'index'])->name('formas_pagamento');
    Route::get('/novo_formaspagamento', [App\Http\Controllers\FormasPagamentoController::class, 'novo'])->name('novo_formaspagamento');
    Route::post('/salvar_formaspagamento', [App\Http\Controllers\FormasPagamentoController::class, 'salvar'])->name('salvar_formaspagamento');
    Route::get('/editar_formaspagamento/{id}', [App\Http\Controllers\FormasPagamentoController::class, 'editar'])->name('editar_formaspagamento');
    Route::post('/atualizar_formaspagamento', [App\Http\Controllers\FormasPagamentoController::class, 'atualizar'])->name('atualizar_formaspagamento');
    Route::get('/deletar_formaspagamento/{id}', [App\Http\Controllers\FormasPagamentoController::class, 'deletar'])->name('deletar_formaspagamento');

    /* --------------------------------------- Pedido Situação ----------------------------------------- */

    Route::get('/pedido_situacao', [App\Http\Controllers\PedidoSituacaoController::class, 'index'])->name('pedido_situacao');
    Route::get('/novo_pedidosituacao', [App\Http\Controllers\PedidoSituacaoController::class, 'novo'])->name('novo_pedidosituacao');
    Route::post('/salvar_pedidosituacao', [App\Http\Controllers\PedidoSituacaoController::class, 'salvar'])->name('salvar_pedidosituacao');
    Route::get('/editar_pedidosituacao/{id}', [App\Http\Controllers\PedidoSituacaoController::class, 'editar'])->name('editar_pedidosituacao');
    Route::post('/atualizar_pedidosituacao', [App\Http\Controllers\PedidoSituacaoController::class, 'atualizar'])->name('atualizar_pedidosituacao');
    Route::get('/deletar_pedidosituacao/{id}', [App\Http\Controllers\PedidoSituacaoController::class, 'deletar'])->name('deletar_pedidosituacao');

    /* -------------------------------------------  Clientes ----------------------------------------------- */

    Route::get('/cliente', [App\Http\Controllers\ClienteController::class, 'index'])->name('cliente');
    Route::get('/novo_cliente', [App\Http\Controllers\ClienteController::class, 'novo'])->name('novo_cliente');
    Route::post('/salvar_cliente', [App\Http\Controllers\ClienteController::class, 'salvar'])->name('salvar_cliente');
    Route::get('/editar_cliente/{id}', [App\Http\Controllers\ClienteController::class, 'editar'])->name('editar_cliente');
    Route::post('/atualizar_cliente', [App\Http\Controllers\ClienteController::class, 'atualizar'])->name('atualizar_cliente');
    Route::get('/deletar_cliente/{id}', [App\Http\Controllers\ClienteController::class, 'deletar'])->name('deletar_cliente');

    /* ------------------------------------------- Gerar Pedidos ------------------------------------------- */
    
    Route::get('/emissao_pedidos', [App\Http\Controllers\EmissaoPedidoController::class, 'index'])->name('emissao_pedidos');

    Route::post('/gerar_pedido', [App\Http\Controllers\EmissaoPedidoController::class, 'gerar'])->name('gerar_pedidos');


});
