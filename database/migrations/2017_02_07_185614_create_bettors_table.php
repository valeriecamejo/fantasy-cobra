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
            $table->dateTime('date_last_connect');
            $table->float('balance');
            $table->string('question');
            $table->string('answer');
            $table->string('code_referred');
            $table->string('photo');
            $table->string('url_own');
            $table->string('url_promotional');
            $table->integer('referred_friends');
            $table->integer('referred_friends_pay');
            $table->integer('city_id');
            $table->float('amount_deposited');
            $table->float('amount_won');
            $table->float('amount_referred_friends');
            $table->float('bono');
            $table->float('not_removable');
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
