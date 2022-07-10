<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoPagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_pagamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pedido');
            $table->integer('id_formapagto');
            $table->integer('qtd_parcelas');
            $table->text('retorno_intermediador');
            $table->text('data_processamento');
            $table->string('num_cartao', 50);
            $table->string('nome_portador', 50);
            $table->integer('codigo_verificacao');
            $table->string('vencimento', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_pagamentos');
    }
}
