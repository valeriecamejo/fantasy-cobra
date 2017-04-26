<?php

use Illuminate\Database\Seeder;

class Team_User_PlayersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    \DB::table('team_user_players')->insert(array(
            array(
              'legacy_id'          => '1',
              'player_id'          => '1',
              'team_user_id'       => '1',
              'name'               => 'Michael',
              'last_name'          => 'Pineda',
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
              'position'           => 'OF',
              'salary'             => '5000',
              'points'             => '0',
            ),
      ));
  }
}
