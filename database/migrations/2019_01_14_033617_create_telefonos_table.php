<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefonos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50)->unique();
            $table->integer('idcategoria')->unsigned();
            $table->integer('idmarca')->unsigned();
            $table->string('pantalla', 50)->nullable();
            $table->string('procesador', 50)->nullable();
            $table->string('memoria')->nullable();
            $table->string('bateria', 50)->nullable();  
            $table->string('sistema', 50)->nullable();
            $table->string('color')->nullable(); 
            $table->string('camara')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->integer('precio')->nullable();
            $table->string('estado', 20);
            $table->timestamps();

            $table->foreign('idcategoria')->references('id')->on('categorias');
            $table->foreign('idmarca')->references('id')->on('marcas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telefonos');
    }
}
