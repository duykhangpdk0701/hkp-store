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
        Schema::table('quote_details', function (Blueprint $table) {
            $table->foreignId('color_id')->nullable()->after('size_value')->constrained('item_colors');
            $table->string('color_value', 30)->nullable()->after('size_value');
            $table->string('color_name', 30)->nullable()->after('size_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quote_details', function (Blueprint $table) {
            $table->dropForeign(['color_id']);
            $table->dropColumn('color_value');
            $table->dropColumn('color_name');
        });
    }
};
