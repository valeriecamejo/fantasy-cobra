<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('players')->insert(array(
        array(
          'team_id'            => '1',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Michael',
          'last_name'          => 'Pineda',
          'position'           => 'PA',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'NY',
          'name_opponent'      => 'DET',
        ),
        array(
          'team_id'            => '1',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'CC',
          'last_name'          => 'Sabathia',
          'position'           => 'PA',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'NY',
          'name_opponent'      => 'DET',
        ),
        array(
          'team_id'            => '1',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Luis',
          'last_name'          => 'Severino',
          'position'           => 'PA',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'NY',
          'name_opponent'      => 'DET',
        ),
        array(
          'team_id'            => '1',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Masahiro',
          'last_name'          => 'Tanaka',
          'position'           => 'PA',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'NY',
          'name_opponent'      => 'DET',
        ),
        array(
          'team_id'            => '1',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Kyle',
          'last_name'          => 'Higashioka',
          'position'           => 'C',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'NY',
          'name_opponent'      => 'DET',
        ),
        array(
          'team_id'            => '1',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Austine',
          'last_name'          => 'Romine',
          'position'           => 'C',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'NY',
          'name_opponent'      => 'DET',
        ),
        array(
          'team_id'            => '1',
          'championship_id'    => '1',
          'name'               => 'Greg',
          'legacy_id'          => '1',
          'last_name'          => 'Bird',
          'position'           => '1B',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'NY',
          'name_opponent'      => 'DET',
        ),
        array(
          'team_id'            => '1',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Chris',
          'last_name'          => 'Carter',
          'position'           => '2B',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'NY',
          'name_opponent'      => 'DET',
        ),
        array(
          'team_id'            => '1',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Starlin',
          'last_name'          => 'Castro',
          'position'           => '3B',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'NY',
          'name_opponent'      => 'DET',
        ),
        array(
          'team_id'            => '1',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Ronald',
          'last_name'          => 'Torreyes',
          'position'           => 'SS',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'NY',
          'name_opponent'      => 'DET',
        ),
        array(
          'team_id'            => '1',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Jacoby',
          'last_name'          => 'Ellsbury',
          'position'           => 'OF',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'NY',
          'name_opponent'      => 'DET',
        ),
        array(
          'team_id'            => '1',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Brett',
          'last_name'          => 'Gardner',
          'position'           => 'OF',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'NY',
          'name_opponent'      => 'DET',
        ),
        array(
          'team_id'            => '1',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Aaron',
          'last_name'          => 'Hicks',
          'position'           => 'OF',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'NY',
          'name_opponent'      => 'DET',
        ),

        array(
          'team_id'            => '2',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Matt',
          'last_name'          => 'Boyd',
          'position'           => 'PA',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'DET',
          'name_opponent'      => 'NY',
        ),
        array(
          'team_id'            => '2',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Michael',
          'last_name'          => 'Fulmer',
          'position'           => 'PA',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'DET',
          'name_opponent'      => 'NY',
        ),
        array(
          'team_id'            => '2',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Daniel',
          'last_name'          => 'Norris',
          'position'           => 'PA',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'DET',
          'name_opponent'      => 'NY',
        ),
        array(
          'team_id'            => '2',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Justin',
          'last_name'          => 'Verlander',
          'position'           => 'PA',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'DET',
          'name_opponent'      => 'NY',
        ),
        array(
          'team_id'            => '2',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Alex',
          'last_name'          => 'Avila',
          'position'           => 'C',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'DET',
          'name_opponent'      => 'NY',
        ),
        array(
          'team_id'            => '2',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'James',
          'last_name'          => 'McCann',
          'position'           => 'C',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'DET',
          'name_opponent'      => 'NY',
        ),
        array(
          'team_id'            => '2',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Miguel',
          'last_name'          => 'Cabrera',
          'position'           => '1B',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'DET',
          'name_opponent'      => 'NY',
        ),
        array(
          'team_id'            => '2',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Ian',
          'last_name'          => 'Kinsler',
          'position'           => '2B',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'DET',
          'name_opponent'      => 'NY',
        ),
        array(
          'team_id'            => '2',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Nick',
          'last_name'          => 'Castellanos',
          'position'           => '3B',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'DET',
          'name_opponent'      => 'NY',
        ),
        array(
          'team_id'            => '2',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'José',
          'last_name'          => 'Iglesias',
          'position'           => 'SS',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'DET',
          'name_opponent'      => 'NY',
        ),
        array(
          'team_id'            => '2',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Tyler',
          'last_name'          => 'Collins',
          'position'           => 'OF',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'DET',
          'name_opponent'      => 'NY',
        ),
        array(
          'team_id'            => '2',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'JaCoby',
          'last_name'          => 'Jones',
          'position'           => 'OF',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'DET',
          'name_opponent'      => 'NY',
        ),
        array(
          'team_id'            => '2',
          'championship_id'    => '1',
          'legacy_id'          => '1',
          'name'               => 'Mikie',
          'last_name'          => 'Mahtook',
          'position'           => 'OF',
          'salary'             => '5000',
          'points'             => '0',
          'status'             => '1',
          'name_team'          => 'DET',
          'name_opponent'      => 'NY',
        ),

      ));
    }
}
