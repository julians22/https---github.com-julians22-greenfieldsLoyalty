<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBirthDateColumnToUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->date('date_of_birth');
            $table->string('child_name', 120);
            $table->date('child_date_of_birth');
            $table->string('postal_code', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_details', function (Blueprint $table){
            $table->dropColumn('date_of_birth');
            $table->dropColumn('child_name');
            $table->dropColumn('child_date_of_birth');
            $table->dropColumn('postal_code');
        });
    }
}
