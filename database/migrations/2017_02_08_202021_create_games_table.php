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
            $table->integer('legacy_id');
            $table->integer('tournament_id');
            $table->integer('team_id_home')->nullable();
            $table->integer('team_id_away')->nullable();
            $table->integer('tournament_group_id')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->integer('score_home')->default(0);
            $table->integer('score_away')->default(0);
            $table->string('status')->nullable();
            $table->string('schema_team_home')->nullable();
            $table->string('schema_team_away')->nullable();
            $table->string('mvp')->nullable();
            $table->dateTime('legacy_stat_request')->nullable();
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
