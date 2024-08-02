<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExchangeRateColumnToIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingresos', function (Blueprint $table) {
            $table->decimal('exchange_rate', 8, 2)
                ->default(6.96)
                ->after('pago3');
        });

        $this->updateExchangeRate();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingresos', function (Blueprint $table) {
            $table->dropColumn('exchange_rate');
        });
    }

    private function updateExchangeRate() {
        DB::table('ingresos')->update(['exchange_rate' => 6.96]);
    }
}
