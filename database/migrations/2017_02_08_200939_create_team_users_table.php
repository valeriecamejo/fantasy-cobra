<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('team_users', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id')->unsigned();
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->integer('sport_id')->unsigned();
      $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
      $table->integer('championship_id')->unsigned();
      $table->foreign('championship_id')->references('id')->on('championships')->onDelete('cascade');
      $table->dateTime('date_inscription');
      $table->float('remaining_salary');
      $table->string('type_journal');
      $table->string('type_play');

      $table->string('name');

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
    Schema::dropIfExists('team_users');
  }
}
