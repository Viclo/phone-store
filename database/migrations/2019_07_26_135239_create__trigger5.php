<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger5 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER tr_upStockVentaAnular AFTER UPDATE ON ventas FOR EACH ROW 
        BEGIN 
        if (new.estado=\'Anulado\') then 
        UPDATE articulos a
            JOIN detalle_ventas dv
            ON dv.idarticulo = a.id
            AND dv.idventa = new.id
            AND dv.estado = 1
            set a.stock = a.stock - dv.cantidad;


            UPDATE articulos a
            JOIN detalle_ventas dv
            ON dv.idarticulo = a.id
            AND dv.idventa = new.id
            AND dv.estado = 0
            set a.stock = a.stock + dv.cantidad;
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
        DB::unprepared('DROP TRIGGER `tr_upStockVentaAnular`');
    }
}
