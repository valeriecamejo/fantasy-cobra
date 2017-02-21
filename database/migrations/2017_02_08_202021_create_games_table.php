<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tournament_id')->unsigned();
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
            $table->integer('tournament_group_id')->unsigned();
            $table->foreign('tournament_group_id')->references('id')->on('tournament_groups')->onDelete('cascade');
            $table->integer('team_id_home');
            $table->integer('team_id_away');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('score_home');
            $table->integer('score_away');
            $table->integer('status');
            $table->string('schema_team_home');
            $table->string('schema_team_away');
            $table->string('mvp');
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
        Schema::dropIfExists('games');
    }
}
