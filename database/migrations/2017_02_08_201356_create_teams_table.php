<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('legacy_id');
            $table->integer('stadium_id')->unsigned();
            $table->foreign('stadium_id')->references('id')->on('stadiums')->onDelete('cascade');
            $table->string('name');
            $table->string('nickname');
            $table->string('short_nickname')->nullable();
            $table->string('logo')->nullable();
            $table->string('president');
            $table->string('coach');
            $table->string('history')->nullable();
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
        Schema::dropIfExists('teams');
    }
}
