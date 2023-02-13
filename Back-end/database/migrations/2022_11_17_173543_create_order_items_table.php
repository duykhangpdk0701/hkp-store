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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->unsignedBigInteger('order_status_id');
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('items');
            $table->unsignedBigInteger('item_variant_id');
            $table->foreign('item_variant_id')->references('id')->on('item_variants');
            $table->unsignedBigInteger('item_stock_id');
            $table->foreign('item_stock_id')->references('id')->on('item_stocks');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('users');
            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id')->references('id')->on('item_sizes');
            $table->unsignedBigInteger('coupon_code_id');
            $table->foreign('coupon_code_id')->references('id')->on('coupon_codes');
            $table->string('item_name', 255);
            $table->double('profit_rate', '15', '4')->default('0.0000');
            $table->tinyInteger('profit_rate_type')->default('1');
            $table->tinyInteger('debt_status')->nullable();
            $table->string('sku', 64);
            $table->string('code', 64);
            $table->string('color', 64);
            $table->string('size_value', 30);
            $table->double('price_in', '15', '4')->default('0.0000');
            $table->double('price', '15', '4')->default('0.0000');
            $table->double('new_status', '3', '2')->default('1.0');
            $table->integer('quantity')->nullable();
            $table->double('discount', '15', '4')->default('0.0000');
            $table->double('tax', '15', '4')->default('0.0000');
            $table->double('shipping', '15', '4')->default('0.0000');
            $table->double('payment_fee', '15', '4')->default('0.0000');
            $table->double('total', '15', '4')->default('0.0000');
            $table->integer('reward')->nullable();
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
        Schema::dropIfExists('order_items');
    }
};
