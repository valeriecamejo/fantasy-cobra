<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TournamentsTableSeeder extends Seeder
{

  public function run()
  {
    $faker = Faker::create();

    DB::table('tournaments')->insert(array(
                                           array(
                                                 'championship_id' => '1',
                                                 'name'            => 'Grandes Ligas de Béisbol 2017',
                                                 'start_date'      => '2017-01-01',
                                                 'end_date'       => '2017-08-01',
                                                 'is_active'       => '1'
                                                 ),
                                           array(
                                                 'championship_id' => '2',
                                                 'name'            => 'Liga Venezolana de Béisbol Profesional 2017',
                                                 'start_date'      => '2017-01-01',
                                                 'end_date'       => '2017-08-01',
                                                 'is_active'       => '1'
                                                 ),
                                           array(
                                                 'championship_id' => '3',
                                                 'name'            => 'Liga Española 2017',
                                                 'start_date'      => '2017-01-01',
                                                 'end_date'       => '2017-08-01',
                                                 'is_active'       => '1'
                                                 ),
                                           array(
                                                 'championship_id' => '4',
                                                 'name'            => 'Liga de Campeones de la UEFA 2017',
                                                 'start_date'      => '2017-01-01',
                                                 'end_date'       => '2017-08-01',
                                                 'is_active'       => '1'
                                                 ),
                                           ));
  }
}
