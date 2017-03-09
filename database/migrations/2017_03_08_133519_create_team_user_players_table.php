<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamUserPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_user_players', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('legacy_id');
            $table->integer('player_id')->unsigned();
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->integer('team_user_id')->unsigned();
            $table->foreign('team_user_id')->references('id')->on('team_users')->onDelete('cascade');
            $table->string('name');
            $table->string('last_name');
            $table->string('position');
            $table->integer('salary');
            $table->float('points');
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
        Schema::dropIfExists('team_user_players');
    }
}
