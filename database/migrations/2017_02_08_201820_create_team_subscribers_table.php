<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_subscribers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sport_id')->unsigned();
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            $table->integer('competition_id')->unsigned();
            $table->foreign('competition_id')->references('id')->on('competitions')->onDelete('cascade');
            $table->integer('team_id')->default(0);
            $table->integer('team_user_id')->unsigned();
            $table->foreign('team_user_id')->references('id')->on('team_users')->onDelete('cascade');
            $table->float('amount')->default(0);
            $table->float('points')->default(0);
            $table->dateTime('date');
            $table->float('balance_before');
            $table->float('balance_after');
            $table->float('bonus')->nullable();
            $table->string('balance');
            $table->boolean('is_winner');
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
        Schema::dropIfExists('team_subscribers');
    }
}
