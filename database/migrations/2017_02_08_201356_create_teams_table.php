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
            $table->integer('stadium_id')->nullable();
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->string('short_nickname')->nullable();
            $table->string('logo')->nullable();
            $table->string('president')->nullable();
            $table->string('coach')->nullable();
            $table->string('history')->nullable();
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
        Schema::dropIfExists('teams');
    }
}
