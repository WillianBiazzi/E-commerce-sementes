<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstoqueTable extends Migration
{
    public function up()
    {
        Schema::create('estoque', function (Blueprint $table) {
            $table->increments('idEstoque');
            $table->decimal('qtd');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estoque');
    }
}
