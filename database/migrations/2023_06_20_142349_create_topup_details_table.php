<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopupDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topup_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('topup_id');
            $table->string('product');
            $table->integer('packsize');
            $table->string('flavour');
            $table->integer('qty');
            $table->integer('price');
            $table->integer('dicount_price')->default(0);
            $table->integer('total');
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
        Schema::dropIfExists('topup_details');
    }
}
