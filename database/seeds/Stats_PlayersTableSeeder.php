<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Stats_PlayersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = Faker::create();

    DB::table('stats_players')->insert(array(
                                             array(
                                                   'stats'           => 'Hit',
                                                   'legacy_id'       => '1',
                                                   'description'     => 'Hit',
                                                   'sport_id'        => '1',
                                                   'championship_id' => '1',
                                                   'points'          => '3',
                                                   ),
                                             array(
                                                   'stats'           => '2B',
                                                   'legacy_id'       => '2',
                                                   'description'     => 'Segunda Base',
                                                   'sport_id'        => '1',
                                                   'championship_id' => '1',
                                                   'points'          => '5.5',
                                                   ),
                                             array(
                                                   'stats'           => '3B',
                                                   'legacy_id'       => '3',
                                                   'description'     => 'Tercera Base',
                                                   'sport_id'        => '1',
                                                   'championship_id' => '1',
                                                   'points'          => '8',
                                                   ),
                                             array(
                                                   'stats'           => 'HR',
                                                   'legacy_id'       => '4',
                                                   'description'     => '',
                                                   'sport_id'        => '1',
                                                   'championship_id' => '1',
                                                   'points'          => '10',
                                                   ),
                                             array(
                                                   'stats'           => 'CI',
                                                   'legacy_id'       => '5',
                                                   'description'     => 'Center Fielder',
                                                   'sport_id'        => '1',
                                                   'championship_id' => '1',
                                                   'points'          => '3',
                                                   ),
                                             array(
                                                   'stats'           => 'CA',
                                                   'legacy_id'       => '6',
                                                   'description'     => '',
                                                   'sport_id'        => '1',
                                                   'championship_id' => '1',
                                                   'points'          => '2',
                                                   ),
                                             array(
                                                   'stats'           => 'BB',
                                                   'legacy_id'       => '7',
                                                   'description'     => '',
                                                   'sport_id'        => '1',
                                                   'championship_id' => '1',
                                                   'points'          => '3',
                                                   ),
                                             array(
                                                   'stats'           => 'BR',
                                                   'legacy_id'       => '8',
                                                   'description'     => '',
                                                   'sport_id'        => '1',
                                                   'championship_id' => '1',
                                                   'points'          => '5',
                                                   ),
                                             array(
                                                   'stats'           => 'GP',
                                                   'legacy_id'       => '9',
                                                   'description'     => '',
                                                   'sport_id'        => '1',
                                                   'championship_id' => '1',
                                                   'points'          => '3',
                                                   ),
                                             array(
                                                   'stats'           => 'OR',
                                                   'legacy_id'       => '10',
                                                   'description'     => '',
                                                   'sport_id'        => '1',
                                                   'championship_id' => '1',
                                                   'points'          => '-3',
                                                   ),
                                             array(
                                                   'stats'           => 'IP',
                                                   'legacy_id'       => '11',
                                                   'description'     => '',
                                                   'sport_id'        => '1',
                                                   'championship_id' => '1',
                                                   'points'          => '4.5',
                                                   ),
                                             array(
                                                   'stats'           => 'K',
                                                   'legacy_id'       => '12',
                                                   'description'     => '',
                                                   'sport_id'        => '1',
                                                   'championship_id' => '1',
                                                   'points'          => '4',
                                                   ),
                                             array(
                                                   'stats'           => 'G',
                                                   'legacy_id'       => '13',
                                                   'description'     => '',
                                                   'sport_id'        => '1',
                                                   'championship_id' => '1',
                                                   'points'          => '10',
                                                   ),
                                             array(
                                                   'stats'           => 'CL',
                                                   'legacy_id'       => '14',
                                                   'description'     => '',
                                                   'sport_id'        => '1',
                                                   'championship_id' => '1',
                                                   'points'          => '-3.6',
                                                   ),
                                             array(
                                                   'stats'           => 'H',
                                                   'legacy_id'       => '15',
                                                   'description'     => '',
                                                   'sport_id'        => '1',
                                                   'championship_id' => '1',
                                                   'points'          => '-1.2',
                                                   ),
                                             array(
                                                   'stats'           => 'BB',
                                                   'legacy_id'       => '16',
                                                   'description'     => '',
                                                   'sport_id'        => '1',
                                                   'championship_id' => '1',
                                                   'points'          => '-1.2',
                                                   ),
                                             array(
                                                   'stats'           => 'GP',
                                                   'legacy_id'       => '17',
                                                   'description'     => '',
                                                   'sport_id'        => '1',
                                                   'championship_id' => '1',
                                                   'points'          => '-1.2',
                                                   ),
                                             array(
                                                   'stats'           => 'L',
                                                   'legacy_id'       => '18',
                                                   'description'     => '',
                                                   'sport_id'        => '1',
                                                   'championship_id' => '1',
                                                   'points'          => '-5',
                                                   ),
                                             array(
                                                   'stats'           => 'G',
                                                   'legacy_id'       => '19',
                                                   'description'     => 'Goal',
                                                   'sport_id'        => '2',
                                                   'championship_id' => '3',
                                                   'points'          => '12',
                                                   ),
                                             array(
                                                   'stats'           => 'A',
                                                   'legacy_id'       => '20',
                                                   'description'     => 'Asistencia',
                                                   'sport_id'        => '2',
                                                   'championship_id' => '3',
                                                   'points'          => '7',
                                                   ),
                                             array(
                                                   'stats'           => 'S',
                                                   'legacy_id'       => '21',
                                                   'description'     => 'Shot',
                                                   'sport_id'        => '2',
                                                   'championship_id' => '3',
                                                   'points'          => '1.5',
                                                   ),
                                             array(
                                                   'stats'           => 'FR',
                                                   'legacy_id'       => '22',
                                                   'description'     => 'Falta Recibida',
                                                   'sport_id'        => '2',
                                                   'championship_id' => '3',
                                                   'points'          => '0.5',
                                                   ),
                                             array(
                                                   'stats'           => 'FC',
                                                   'legacy_id'       => '23',
                                                   'description'     => 'Falta Cometida',
                                                   'sport_id'        => '2',
                                                   'championship_id' => '3',
                                                   'points'          => '0.5',
                                                   ),
                                             array(
                                                   'stats'           => 'BR',
                                                   'legacy_id'       => '24',
                                                   'description'     => 'Balones Recuperados, solo defensa',
                                                   'sport_id'        => '2',
                                                   'championship_id' => '3',
                                                   'points'          => '1',
                                                   ),
                                             array(
                                                   'stats'           => 'TA',
                                                   'legacy_id'       => '25',
                                                   'description'     => 'Tarjeta Amarilla',
                                                   'sport_id'        => '2',
                                                   'championship_id' => '3',
                                                   'points'          => '-2',
                                                   ),
                                             array(
                                                   'stats'           => 'TR',
                                                   'legacy_id'       => '26',
                                                   'description'     => 'Tarjeta Roja',
                                                   'sport_id'        => '2',
                                                   'championship_id' => '3',
                                                   'points'          => '-4',
                                                   ),
                                             array(
                                                   'stats'           => 'SHOA',
                                                   'legacy_id'       => '27',
                                                   'description'     => 'Clean Sheet, solo arquero',
                                                   'sport_id'        => '2',
                                                   'championship_id' => '3',
                                                   'points'          => '10',
                                                   ),
                                             array(
                                                   'stats'           => 'SHOD',
                                                   'legacy_id'       => '28',
                                                   'description'     => 'Clean Sheet, solo defensa',
                                                   'sport_id'        => '2',
                                                   'championship_id' => '3',
                                                   'points'          => '3',
                                                   ),
                                             array(
                                                   'stats'           => 'PF',
                                                   'legacy_id'       => '29',
                                                   'description'     => 'Penalti Fallado',
                                                   'sport_id'        => '2',
                                                   'championship_id' => '3',
                                                   'points'          => '-5',
                                                   ),
                                             array(
                                                   'stats'           => 'PD',
                                                   'legacy_id'       => '30',
                                                   'description'     => 'Penalti Defendido, solo arquero',
                                                   'sport_id'        => '2',
                                                   'championship_id' => '3',
                                                   'points'          => '5',
                                                   ),
                                             array(
                                                   'stats'           => 'W',
                                                   'legacy_id'       => '31',
                                                   'description'     => 'Victoria, arquero',
                                                   'sport_id'        => '2',
                                                   'championship_id' => '3',
                                                   'points'          => '5',
                                                   ),
                                             array(
                                                   'stats'           => 'SA',
                                                   'legacy_id'       => '32',
                                                   'description'     => 'Atrapada, arquero',
                                                   'sport_id'        => '2',
                                                   'championship_id' => '3',
                                                   'points'          => '2',
                                                   ),
                                             array(
                                                   'stats'           => 'GA',
                                                   'legacy_id'       => '33',
                                                   'description'     => 'Goles en Contra, arquero',
                                                   'sport_id'        => '2',
                                                   'championship_id' => '3',
                                                   'points'          => '-2.5',
                                                   )
                                             ));
  }
}
