<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyHistoryRecordIntoDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->string('history_milk_category', 100)->nullable()->change();
            $table->string('history_milk_product', 100)->nullable()->change();
            $table->string('history_milk_packsize', 100)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->string('history_milk_category', 100)->nullable(false)->change();
            $table->string('history_milk_product', 100)->nullable(false)->change();
            $table->string('history_milk_packsize', 100)->nullable(false)->change();
        });
    }
}
