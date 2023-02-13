<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_cities', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->mediumText('geometry')->nullable();
            $table->string('center')->nullable();
            $table->string('color')->nullable();
            $table->string('bounding_box')->nullable();
            $table->integer('order')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('pre')->nullable();
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
        Schema::dropIfExists('sys_cities');
    }
}
