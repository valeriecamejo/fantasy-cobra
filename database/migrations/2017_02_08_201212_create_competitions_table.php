<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('prize_id')->unsigned();
            $table->foreign('prize_id')->references('id')->on('prizes')->onDelete('cascade');
            $table->integer('sport_id')->unsigned();
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            $table->integer('championship_id')->unsigned();
            $table->foreign('championship_id')->references('id')->on('championships')->onDelete('cascade');
            $table->string('name');
            $table->string('type');
            $table->dateTime('date');
            $table->integer('user_max');
            $table->integer('user_min');
            $table->integer('prize_guaranteed');
            $table->string('status');
            $table->integer('entry_cost');
            $table->string('password');
            $table->integer('entry');
            $table->integer('cost_guaranteed');
            $table->string('description');
            $table->integer('duration');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('pot');
            $table->integer('free');
            $table->boolean('is_important');
            $table->integer('enrolled');
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
        Schema::dropIfExists('competitions');
    }
}
