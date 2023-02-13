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
        Schema::create('quote_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quote_id')->constrained();
            $table->foreignId('item_id')->nullable()->constrained();
            $table->foreignId('item_variant_id')->nullable()->constrained();
            $table->foreignId('size_id')->nullable()->constrained('item_sizes');
            $table->foreignId('coupon_id')->nullable()->constrained('coupon_codes');
            $table->string('size_value')->nullable();
            $table->decimal('price', 15, 4)->nullable()->default(0);
            $table->integer('quantity')->nullable();
            $table->decimal('discount', 15, 4)->nullable()->default(0);
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
        Schema::dropIfExists('quote_details');
    }
};
