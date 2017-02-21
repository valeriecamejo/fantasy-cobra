<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('description');
            $table->integer('cost');
            $table->string('photo');
            $table->string('url');
            $table->string('web');
            $table->string('active');
            $table->string('orde');
            $table->integer('type');
            $table->string('min');
            $table->string('max');
            $table->string('rate');
            $table->string('deposit');
            $table->string('quantity');
            $table->string('code_promotional');
            $table->string('affiliate_min');
            $table->string('affiliate_max');
            $table->string('affiliate_rate');
            $table->string('affiliate_deposit');
            $table->string('affiliate_quantity');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
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
        Schema::dropIfExists('promotions');
    }
}
