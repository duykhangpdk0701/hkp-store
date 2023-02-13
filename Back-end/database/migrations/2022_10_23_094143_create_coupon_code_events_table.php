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
        Schema::create('coupon_code_events', function (Blueprint $table) {
            $table->id();
            $table->string('name', '255')->nullable()->default();
            $table->string('description', '3200')->nullable()->default();
            $table->tinyInteger('status')->default('1');
            $table->tinyInteger('type')->default('1');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
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
        Schema::dropIfExists('coupon_code_events');
    }
};
