<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoTable extends Migration
{
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->integer('idPedido')->primary();
            $table->date('dataPedido');
            $table->integer('fk_clientes_idCliente')->unsigned();
            $table->foreign('fk_clientes_idCliente')->references('idCliente')->on('clientes')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}

