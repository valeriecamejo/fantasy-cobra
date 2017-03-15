<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->renameColumn('user_id', 'tournament_id');
            $table->dropColumn('entry');
            $table->dropColumn('duration');
            $table->integer('permanent')->default(0);

        });
    }

    public function down()
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->renameColumn('tournament_id', 'user_id');
            $table->string('entry')->nullable()->after('password');
            $table->string('duration')->nullable()->after('description');
            $table->dropColumn('permanent');

        });
    }
}
