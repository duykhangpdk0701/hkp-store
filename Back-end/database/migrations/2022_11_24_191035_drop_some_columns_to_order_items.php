<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign('order_items_supplier_id_foreign');
            $table->dropColumn('supplier_id');
            $table->dropColumn('profit_rate');
            $table->dropColumn('profit_rate_type');
            $table->dropColumn('color');
            $table->dropColumn('debt_status');
            $table->dropColumn('new_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_items', function (Blueprint $table) {
            //
        });
    }
};
