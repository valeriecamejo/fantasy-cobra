<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats_players', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('legacy_id');
            $table->string('description')->nullable();
            $table->integer('sport_id')->unsigned();
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            $table->boolean('calculated')->nullable();
            $table->integer('points');
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
        Schema::dropIfExists('stats_players');
    }
}
