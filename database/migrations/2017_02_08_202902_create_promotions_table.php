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
            $table->string('description')->nullable();
            $table->integer('cost')->nullable();
            $table->string('photo');
            $table->string('url');
            $table->string('web');
            $table->string('active');
            $table->string('orde');
            $table->integer('type')->nullable();
            $table->string('min')->nullable();
            $table->string('max')->nullable();
            $table->string('rate')->nullable()->default(0);
            $table->string('deposit')->nullable();
            $table->string('quantity')->nullable();
            $table->string('code_promotional')->nullable();
            $table->string('affiliate_min')->nullable();
            $table->string('affiliate_max')->nullable();
            $table->string('affiliate_rate')->nullable();
            $table->string('affiliate_deposit')->nullable();
            $table->string('affiliate_quantity')->nullable();
            $table->dateTimeTz('start_date')->nullable();
            $table->dateTimeTz('end_date')->nullable();
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
