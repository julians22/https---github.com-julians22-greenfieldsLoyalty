<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInformationColumnIntoTopupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('top_ups', function (Blueprint $table) {
            $table->string('receipt_number')->nullable();
            $table->date('receipt_date')->nullable();
            $table->string('receipt_channel')->nullable();
            $table->string('receipt_subchannel')->nullable();
            $table->string('receipt_area')->nullable();
            $table->string('receipt_storename')->nullable();
            $table->longText('note')->change();
            $table->longText('failed_reason')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('top_ups', function (Blueprint $table) {
            $table->dropColumn('receipt_number');
            $table->dropColumn('receipt_date');
            $table->dropColumn('receipt_channel');
            $table->dropColumn('receipt_subchannel');
            $table->dropColumn('receipt_area');
            $table->dropColumn('receipt_storename');
        });
    }
}
