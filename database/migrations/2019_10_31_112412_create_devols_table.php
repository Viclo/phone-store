<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devols', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idcategoria')->unsigned();
            $table->integer('idsucursal')->unsigned()->nullable();
            $table->integer('idmarca')->unsigned();
            $table->string('codigo', 50)->nullable();
            $table->string('proveedor')->nullable();
            $table->string('nombre', 100);
            $table->decimal('precio_venta', 11, 2);
            $table->decimal('precio_compra', 11, 2)->nullable();
            $table->integer('stock');
            $table->date('fechaA');
            $table->string('descripcion', 256)->nullable();
            $table->boolean('condicion')->default(1);
            $table->timestamps();

            $table->foreign('idcategoria')->references('id')->on('categorias');
            $table->foreign('idsucursal')->references('id')->on('sucursals');
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
        Schema::dropIfExists('devols');
    }
}
