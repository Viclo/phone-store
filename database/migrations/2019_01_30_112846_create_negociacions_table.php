<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNegociacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negociacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreCliente', 50);
            $table->string('telefonoCliente', 50);
            $table->integer('idtelefono')->unsigned();
            $table->string('nombreTel', 50);
            $table->string('ci', 50);
            $table->string('marca', 20);
            $table->string('color',20);
            $table->string('correo',20);
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->string('condicion', 20);
            $table->string('estado', 20);
            $table->timestamps();

            $table->foreign('idtelefono')->references('id')->on('telefonos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('negociacions');
    }
}
