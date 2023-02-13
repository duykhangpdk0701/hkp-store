<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained();
            $table->string('sku');
            $table->string('slug');
            $table->string('name');
            $table->string('description');

            $table->unsignedBigInteger('item_person_type_id');
            $table->foreign('item_person_type_id')->references('id')->on('item_person_types');

            $table->integer('stock_in')->default(0);
            $table->integer('stock_out')->default(0);
            $table->unsignedBigInteger('item_stock_status_id');
            $table->foreign('item_stock_status_id')->references('id')->on('item_stock_statuses');

            $table->integer('order')->default(0);

            $table->integer('is_featured')->default(0)->nullable();
            $table->integer('media_type')->default(\App\Models\Item::MEDIA_TYPE_NORMAL);

            $table->integer('status')->default(0);

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
        Schema::dropIfExists('items');
    }
}
