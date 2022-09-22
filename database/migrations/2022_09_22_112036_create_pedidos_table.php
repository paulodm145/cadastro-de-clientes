<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venda_id')->nullable();
            $table->foreign('venda_id')->references('id')->on('vendas');
            $table->unsignedBigInteger('produto_id')->nullable();
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->integer('quantity');
            $table->date('sale_date')->nullable(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
