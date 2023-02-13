<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysWardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_wards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('district_id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->mediumText('geometry')->nullable();
            $table->string('center')->nullable();
            $table->string('color')->nullable();
            $table->string('bounding_box')->nullable();
            $table->string('pre')->nullable();
            $table->integer('order')->nullable();
            $table->tinyInteger('status');
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('sys_cities');
            $table->foreign('district_id')->references('id')->on('sys_districts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_wards');
    }
}
