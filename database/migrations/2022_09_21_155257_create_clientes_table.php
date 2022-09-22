<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable(false);
            $table->string('cpfcnpj', 15)->nullable(false);
            $table->date('birth_date')->nullable(false);
            $table->string('telephone', 15)->nullable(false);
            $table->string('address', 255)->nullable(false);
            $table->string('district', 255)->nullable(false);
            $table->string('number', 50)->nullable(false);
            $table->string('complement', 100);
            $table->string('city', 10)->nullable(false);
            $table->string('state', 2)->nullable(false);
            $table->string('postal_code', 8)->nullable(false);
            $table->string('email', 255)->nullable(false);
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
        Schema::dropIfExists('clientes');
    }
}
