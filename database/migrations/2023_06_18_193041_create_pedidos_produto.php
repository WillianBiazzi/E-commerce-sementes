<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidosProduto', function (Blueprint $table) {
            $table->bigIncrements('idProduto');
            $table->decimal('qtdPedido');
            $table->bigInteger('idPedido')->unsigned()->nullable();
            $table->foreign('idPedido')->references('idPedido')->on('pedidos');
            $table->bigInteger('idProduto')->unsigned()->nullable();
            $table->foreign('idProduto')->references('idProduto')->on('produtos');
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
        Schema::dropIfExists('pedidosProduto');
    }
}
