<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChannelColumnIntoRedeemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('redeems', function (Blueprint $table) {
            $table->enum('channel', ['web', 'whatsapp'])->default('web');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('redeems', function (Blueprint $table) {
            $table->dropColumn('channel');
        });
    }
}
