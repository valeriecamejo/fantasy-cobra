<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrizeTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prize_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prize_id')->unsigned();
            $table->foreign('prize_id')->references('id')->on('prizes')->onDelete('cascade');
            $table->string('range');
            $table->integer('rate')->default(0);
            $table->integer('winning')->default(0);
            $table->integer('rate_win')->default(0);
            $table->float('rate_range')->default(0);
            $table->tinyInteger('equitable')->default(0);
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
        Schema::dropIfExists('prize_types');
    }
}
