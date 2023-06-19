<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->integer('idPedido')->primary();
            $table->decimal('valorTotal', 10, 2);
            $table->unsignedBigInteger('fk_cliente_docCliente')->nullable();
            $table->unsignedBigInteger('fk_vendedor_docVendedor');
            $table->timestamps();

            $table->foreign('fk_cliente_docCliente')
                ->references('docCliente')->on('cliente')
                ->onDelete('set null');

            $table->foreign('fk_vendedor_docVendedor')
                ->references('docVendedor')->on('vendedor')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedido', function (Blueprint $table) {
            $table->dropForeign(['fk_cliente_docCliente']);
            $table->dropForeign(['fk_vendedor_docVendedor']);
        });

        Schema::dropIfExists('pedido');
    }
}
