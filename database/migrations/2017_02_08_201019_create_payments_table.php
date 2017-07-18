<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('amount');
            $table->string('transaction_type');
            $table->float('balance_before');
            $table->string('account_number')->nullable();
            $table->string('bank')->nullable();
            $table->integer('point_response')->nullable();
            $table->string('point_type')->nullable();
            $table->string('device')->default('desktop');
            $table->string('txid')->nullable();
            $table->string('error_result')->nullable();
            $table->string('status')->nullable();
            $table->string('code_error')->nullable();
            $table->boolean('approved')->default(false);
            $table->float('total_currency')->nullable();
            $table->string('paypal_email')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->integer('reference_number')->nullable();
            $table->dateTimeTz('transfer_date')->nullable();
            $table->integer('account_type')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
