<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SportsTableSeeder extends Seeder
{

  public function run()
  {
    $faker = Faker::create();

    DB::table('sports')->insert(array(
                                      array(
                                            'legacy_id'    =>  1,
                                            'name'         => 'baseball',
                                            'name_api'     => 'baseball',
                                            'description'  => 'Deporte de equipo jugado entre dos conjuntos de nueve jugadores cada uno.'
                                            ),
                                      array(
                                            'legacy_id'    =>  2,
                                            'name'         => 'football',
                                            'name_api'     => 'football',
                                            'description'  => 'Deporte de equipo jugado entre dos conjuntos de once jugadores cada uno y algunos árbitros que se ocupan de que las normas se cumplan correctamente.'
                                            )));
  }
}
