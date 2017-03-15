<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBettorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bettors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->dateTime('date_last_connect');
            $table->float('balance')->default(0);
            $table->string('question')->nullable();
            $table->string('answer')->nullable();
            $table->string('code_referred')->nullable();
            $table->string('photo')->nullable();
            $table->string('url_own');
            $table->string('url_promotional')->nullable();
            $table->integer('referred_friends')->nullable();
            $table->integer('referred_friends_pay')->default(0);
            $table->float('amount_deposited')->default(0);
            $table->float('amount_won')->default(0);
            $table->float('amount_referred_friends')->default(0);
            $table->float('bono')->default(0);
            $table->float('not_removable')->default(0);
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
        Schema::dropIfExists('bettors');
    }
}
