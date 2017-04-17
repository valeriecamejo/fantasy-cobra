<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->integer('championship_id')->unsigned();
            $table->foreign('championship_id')->references('id')->on('championships')->onDelete('cascade');
            $table->string('name');
            $table->string('last_name');
            $table->string('position');
            $table->integer('salary');
            $table->integer('points')->default(0);
            $table->string('status');
            $table->string('name_team');
            $table->string('name_opponent');
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
        Schema::dropIfExists('team_user_player_histories');
        Schema::dropIfExists('team_players');
        Schema::dropIfExists('players');
    }
}
