<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmeAtorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filme_atores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('filme_id')->unsigned()->nullable();
            $table->foreign('filme_id')->references('id')->on('filmes');
            $table->bigInteger('ator_id')->unsigned()->nullable();
            $table->foreign('ator_id')->references('id')->on('atores');
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
        Schema::dropIfExists('filme_atores');
    }
}
