<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_type_id')->unsigned();
            $table->foreign('user_type_id')->references('id')->on('user_types')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username');
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('status');
            $table->string('email')->unique();
            $table->integer('sex')->nullable();
            $table->string('dni')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('user_type_id');
        Schema::dropIfExists('users');
    }
}
