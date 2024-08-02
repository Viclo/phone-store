<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExchangeRateColumnToVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->decimal('exchange_rate', 8, 2)
                ->default(6.96)
                ->after('total');
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
        Schema::table('ventas', function (Blueprint $table) {
            $table->dropColumn('exchange_rate');
        });
    }

    private function updateExchangeRate() {
        DB::table('ventas')->update(['exchange_rate' => 6.96]);
    }
}
