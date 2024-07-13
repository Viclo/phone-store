<?php
 
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
 
class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idcliente')->unsigned();
            $table->foreign('idcliente')->references('id')->on('personas');
            $table->integer('idusuario')->unsigned();
            $table->foreign('idusuario')->references('id')->on('users');
            $table->string('tipo_comprobante', 20);
            $table->string('serie_comprobante', 7)->nullable();
            $table->string('vendedor')->nullable();
            $table->string('num_comprobante', 10);
            $table->date('fecha_hora');
            $table->string('moneda', 10);
            $table->decimal('impuesto', 4, 2);
            $table->decimal('total', 11, 2);
            $table->decimal('pago1', 11, 2);
            $table->decimal('pago2', 11, 2)->nullable();
            $table->decimal('pago3', 11, 2)->nullable();
            $table->date('fecha_2')->nullable();
            $table->date('fecha_3')->nullable();
            $table->string('estado', 50)->nullable();
            // $table->string('estado', 20);
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
        Schema::dropIfExists('ventas');
    }
}
