<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class ChampionshipsTableSeeder extends Seeder
{

  public function run()
  {
    $faker = Faker::create();

    DB::table('championships')->insert(array(
                                             array(
                                                   'legacy_id'    => '1',
                                                   'sport_id'     => '1',
                                                   'name'         => 'MLB',
                                                   'description'  => 'Ligas de béisbol profesional',
                                                   'avatar'       => 'images/BolaMLB.png'
                                                   ),
                                             array(
                                                   'legacy_id'    => '2',
                                                   'sport_id'     => '1',
                                                   'name'         => 'LVBP',
                                                   'description'  => 'Liga Venezolana de Béisbol Profesional',
                                                   'avatar'       => 'images/BolaLVBP.png'
                                                   ),
                                             array(
                                                   'legacy_id'    => '3',
                                                   'sport_id'     => '2',
                                                   'name'         => 'LALIGA',
                                                   'description'  => 'Liga Española',
                                                   'avatar'       => 'images/BolaLIGA.png'
                                                   ),
                                             array(
                                                   'legacy_id'    => '4',
                                                   'sport_id'     => '2',
                                                   'name'         => 'UCL',
                                                   'description'  => 'Liga de Campeones de la UEFA',
                                                   'avatar'       => 'images/BolaUCL.png'
                                                   )
                                             ));
  }
}

