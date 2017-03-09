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
            $table->dateTime('date');
            $table->integer('amount');
            $table->integer('paid');
            $table->integer('balance_before');
            $table->integer('account_number');
            $table->string('bank');
            $table->integer('reference_number');
            $table->integer('type');
            $table->integer('approved_pay');
            $table->dateTime('transfer_date');
            $table->integer('type_account');
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
