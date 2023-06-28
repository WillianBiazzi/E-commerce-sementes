<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('idProduto');
            $table->string('nomeProduto', 30);
            $table->string('descricao', 50);
            $table->decimal('preco', 12, 4);
            $table->unsignedInteger('fk_estoque_idEstoque');
            $table->foreign('fk_estoque_idEstoque')
                  ->references('idEstoque')
                  ->on('estoques')
                  ->onDelete('restrict');
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
        Schema::dropIfExists('produtos');
    }
}
