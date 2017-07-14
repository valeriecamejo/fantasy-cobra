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
                                                   'legacy_id'    => 1,
                                                   'sport_id'     => 1,
                                                   'name'         => 'MLB',
                                                   'description'  => 'Ligas de béisbol profesional',
                                                   'is_active'    => true,
                                                   'avatar'       => 'images/BolaMLB.png'
                                                   ),
                                             array(
                                                   'legacy_id'    => 2,
                                                   'sport_id'     => 1,
                                                   'name'         => 'LVBP',
                                                   'description'  => 'Liga Venezolana de Béisbol Profesional',
                                                   'is_active'    => true,
                                                   'avatar'       => 'images/BolaLVBP.png'
                                                   )
                                             ));
  }
}

