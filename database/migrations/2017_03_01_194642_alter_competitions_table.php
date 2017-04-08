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
            $table->dropColumn('entry');
            $table->dropColumn('duration');

        });
    }

    public function down()
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->string('entry')->nullable()->after('password');
            $table->string('duration')->nullable()->after('description');
        });
    }
}
