<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoProdutoTable extends Migration
{
    public function up()
    {
        Schema::create('pedidoProduto', function (Blueprint $table) {
            $table->integer('fk_produtos_idProduto')->unsigned();
            $table->integer('fk_pedidos_idPedido')->unsigned();
            $table->decimal('qtdPedido');

            $table->foreign('fk_produtos_idProduto')->references('idProduto')->on('produtos')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('fk_pedidos_idPedido')->references('idPedido')->on('pedido')->onUpdate('cascade')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidoProduto');
    }
}
