<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_code', 20)->unique();
            $table->bigInteger('user_id')->nullable(false);
            $table->bigInteger('admin_id')->default(1)->nullable();
            $table->enum('type', ['redeem', 'topup'])->nullable(false);
            $table->enum('status', ['success', 'send', 'process', 'failed', 'created'])->default('created');
            $table->string('note')->nullable();
            $table->string('failed_reason')->nullable();
            $table->timestamp('success_at')->nullable();
            $table->timestamp('process_at')->nullable();
            $table->timestamp('send_at')->nullable();
            $table->timestamp('failed_at')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
