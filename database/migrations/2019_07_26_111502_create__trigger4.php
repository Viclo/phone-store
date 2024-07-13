<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER tr_upStockIngresoAnular AFTER UPDATE ON ingresos FOR EACH ROW 
        BEGIN
        if (new.estado=\'Anulado\') then   
        UPDATE articulos a
            JOIN detalle_ingresos di
            ON di.idarticulo = a.id
            AND di.idingreso = new.id
            SET a.stock = a.stock - di.cantidad;
            end if;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_upStockIngresoAnular`');
    }
}
