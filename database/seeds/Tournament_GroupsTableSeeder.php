<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tournament_GroupsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('tournament_groups')->insert(array(
      array(
        'tournament_id'   => 1,
        'name'            => 'Grupo General',
        'description'     => 'Data de prueba'
      )
    ));
  }
}
