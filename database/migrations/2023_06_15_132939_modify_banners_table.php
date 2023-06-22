<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        });

        Schema::table('banners', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->text('image')->nullable()->change();
            $table->boolean('publish')->default(0);
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->string('name')->nullable(false)->change();
            $table->string('image')->nullable(false)->change();
            $table->dropColumn('publish');
            $table->date('start_date')->change();
            $table->date('end_date')->change();
        });
    }
}
