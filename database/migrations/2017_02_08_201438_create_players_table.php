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
            $table->integer('team_id');
            $table->integer('championship_id');
            $table->string('name');
            $table->string('last_name');
            $table->string('position');
            $table->integer('salary')->nullable();
            $table->integer('points')->default(0);
            $table->string('status');
            $table->string('status_api')->nullable();
            $table->dateTimeTz('legacy_stat_request')->nullable();
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
