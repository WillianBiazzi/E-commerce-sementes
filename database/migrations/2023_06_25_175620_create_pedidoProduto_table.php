<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidoProduto', function (Blueprint $table) {
            $table->unsignedInteger('fk_produtos_idProduto');
            $table->unsignedInteger('fk_pedidos_idPedido');
            $table->decimal('qtdPedido');
            $table->foreign('fk_produtos_idProduto')
                  ->references('idProduto')
                  ->on('produtos')
                  ->onDelete('restrict');
            $table->foreign('fk_pedidos_idPedido')
                  ->references('idPedido')
                  ->on('pedidos')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('pedidoProduto');
    }
}
