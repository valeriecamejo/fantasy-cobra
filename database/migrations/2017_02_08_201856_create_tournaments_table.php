<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('legacy_id');
            $table->integer('championship_id')->unsigned();
            $table->foreign('championship_id')->references('id')->on('championships')->onDelete('cascade');
            $table->string('name');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('is_active');
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
        Schema::dropIfExists('tournaments');
    }
}
