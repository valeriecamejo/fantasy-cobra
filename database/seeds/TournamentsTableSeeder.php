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
                                                 'legacy_id'       =>  1,
                                                 'championship_id' =>  1,
                                                 'name'            => 'Grandes Ligas de Béisbol 2017',
                                                 'start_date'      => '2017-01-01 15:00',
                                                 'end_date'        => '2017-08-01 15:00',
                                                 'is_active'       =>  1
                                                 ),
                                           array(
                                                 'legacy_id'       =>  2,
                                                 'championship_id' =>  2,
                                                 'name'            => 'Liga Venezolana de Béisbol Profesional 2017',
                                                 'start_date'      => '2017-01-01 15:00',
                                                 'end_date'        => '2017-08-01 15:00',
                                                 'is_active'       =>  1
                                                 )
                                           ));
  }
}
