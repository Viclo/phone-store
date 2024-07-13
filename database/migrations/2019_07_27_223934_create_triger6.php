<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriger6 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER tr_upStockIngresoArti AFTER INSERT ON detalle_ingresos FOR EACH ROW 
        BEGIN 
        UPDATE articulos 
            SET condicion = condicion - 4
            WHERE articulos.id = new.idarticulo;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_upStockVentaAnular`');
    }
}
