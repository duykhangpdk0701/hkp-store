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
            $table->foreignId('color_id')->nullable()->after('size_id')->constrained('item_colors');
            $table->string('color_value', 30)->nullable()->after('size_value');
            $table->string('color_name', 30)->nullable()->after('size_value');
            $table->foreignId('order_detail_id')->nullable()->after('coupon_code_id')->constrained('order_detail');
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
