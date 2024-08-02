<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFecha2AndFecha3ColumnsToIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingresos', function (Blueprint $table) {
            $table->date('fecha_2')->nullable()->after('estado');
            $table->date('fecha_3')->nullable()->after('fecha_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingresos', function (Blueprint $table) {
            $table->dropColumn('fecha_2');
            $table->dropColumn('fecha_3');
        });
    }
}
