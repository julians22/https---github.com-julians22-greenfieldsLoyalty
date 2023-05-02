<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('name', 125);
            $table->string('image', 255);
            $table->integer('position')->default(0);
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });

        Schema::create('page_has_banners', function(Blueprint $table) {
            $table->id();
            $table->string('page');
            $table->index('page', 'page_name_index');
            $table->string('model_type', 225);
            $table->bigInteger('model_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
