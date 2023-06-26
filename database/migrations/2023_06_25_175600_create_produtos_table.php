<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('idProduto');
            $table->string('nomeProduto', 30);
            $table->string('descricao', 50);
            $table->decimal('preco', 12, 4);
            $table->integer('fk_estoque_idEstoque')->unsigned();

            $table->foreign('fk_estoque_idEstoque')->references('idEstoque')->on('estoque')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}

