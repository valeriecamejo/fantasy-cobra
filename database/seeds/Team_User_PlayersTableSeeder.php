<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Team_User_PlayersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('team_user_players')->insert(array(
                                                 array(
                                                       'legacy_id'          => '1',
                                                       'player_id'          => '1',
                                                       'team_user_id'       => '1',
                                                       'name'               => 'Michael',
                                                       'last_name'          => 'Pineda',
                                                       'name_team'          => 'NA',
                                                       'name_opponent'      => 'NA',
                                                       'position'           => 'PA',
                                                       'salary'             => '5000',
                                                       'points'             => '0',
                                                       ),
                                                 array(
                                                       'legacy_id'          => '1',
                                                       'player_id'          => '5',
                                                       'team_user_id'       => '1',
                                                       'name'               => 'Kyle',
                                                       'last_name'          => 'Higashioka',
                                                       'name_team'          => 'NA',
                                                       'name_opponent'      => 'NA',
                                                       'position'           => 'C',
                                                       'salary'             => '5000',
                                                       'points'             => '0',
                                                       ),
                                                 array(
                                                       'legacy_id'          => '1',
                                                       'player_id'          => '7',
                                                       'team_user_id'       => '1',
                                                       'name'               => 'Greg',
                                                       'last_name'          => 'Bird',
                                                       'name_team'          => 'NA',
                                                       'name_opponent'      => 'NA',
                                                       'position'           => '1B',
                                                       'salary'             => '5000',
                                                       'points'             => '0',
                                                       ),
                                                 array(
                                                       'legacy_id'          => '1',
                                                       'player_id'          => '8',
                                                       'team_user_id'       => '1',
                                                       'name'               => 'Chris',
                                                       'last_name'          => 'Carter',
                                                       'name_team'          => 'NA',
                                                       'name_opponent'      => 'NA',
                                                       'position'           => '2B',
                                                       'salary'             => '5000',
                                                       'points'             => '0',
                                                       ),
                                                 array(
                                                       'legacy_id'          => '1',
                                                       'player_id'          => '9',
                                                       'team_user_id'       => '1',
                                                       'name'               => 'Starlin',
                                                       'last_name'          => 'Castro',
                                                       'name_team'          => 'NA',
                                                       'name_opponent'      => 'NA',
                                                       'position'           => '3B',
                                                       'salary'             => '5000',
                                                       'points'             => '0',
                                                       ),
                                                 array(
                                                       'legacy_id'          => '1',
                                                       'player_id'          => '10',
                                                       'team_user_id'       => '1',
                                                       'name'               => 'Ronald',
                                                       'last_name'          => 'Torreyes',
                                                       'name_team'          => 'NA',
                                                       'name_opponent'      => 'NA',
                                                       'position'           => 'SS',
                                                       'salary'             => '5000',
                                                       'points'             => '0',
                                                       ),
                                                 array(
                                                       'legacy_id'          => '1',
                                                       'player_id'          => '11',
                                                       'team_user_id'       => '1',
                                                       'name'               => 'Jacoby',
                                                       'last_name'          => 'Ellsbury',
                                                       'name_team'          => 'NA',
                                                       'name_opponent'      => 'NA',
                                                       'position'           => 'OF',
                                                       'salary'             => '5000',
                                                       'points'             => '0',
                                                       ),
                                                 array(
                                                       'legacy_id'          => '1',
                                                       'player_id'          => '12',
                                                       'team_user_id'       => '1',
                                                       'name'               => 'Brett',
                                                       'last_name'          => 'Gardner',
                                                       'name_team'          => 'NA',
                                                       'name_opponent'      => 'NA',
                                                       'position'           => 'OF',
                                                       'salary'             => '5000',
                                                       'points'             => '0',
                                                       ),
                                                 array(
                                                       'legacy_id'          => '1',
                                                       'player_id'          => '13',
                                                       'team_user_id'       => '1',
                                                       'name'               => 'Aaron',
                                                       'last_name'          => 'Hicks',
                                                       'name_team'          => 'NA',
                                                       'name_opponent'      => 'NA',
                                                       'position'           => 'OF',
                                                       'salary'             => '5000',
                                                       'points'             => '0',
                                                       ),
                                                 ));
}
}
