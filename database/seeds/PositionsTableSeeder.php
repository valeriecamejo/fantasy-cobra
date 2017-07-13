<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run() {

    $faker = Faker::create();

    DB::table('positions')->insert(array(
                                         array(
                                               'legacy_id'            => 1,
                                               'sport_id'             => 1,
                                               'name'                 => 'PA',
                                               'description'          => 'Position baseball',
                                               'legacy_stat_request'  => '2017-05-10 19:30:00',
                                               ),
                                         array(
                                               'legacy_id'    => 2,
                                               'sport_id'     => 1,
                                               'name'         => 'C',
                                               'description'  => 'Position baseball',
                                               'legacy_stat_request'  => '2017-05-10 19:30:00',
                                               ),
                                         array(
                                               'legacy_id'    => 3,
                                               'sport_id'     => 1,
                                               'name'         => '1B',
                                               'description'  => 'Position baseball',
                                               'legacy_stat_request'  => '2017-05-10 19:30:00',
                                               ),
                                         array(
                                               'legacy_id'    => 1,
                                               'sport_id'     => 1,
                                               'name'         => '2B',
                                               'description'  => 'Position baseball',
                                               'legacy_stat_request'  => '2017-05-10 19:30:00',
                                               ),
                                         array(
                                               'legacy_id'    => 1,
                                               'sport_id'     => 1,
                                               'name'         => '3B',
                                               'description'  => 'Position baseball',
                                               'legacy_stat_request'  => '2017-05-10 19:30:00',
                                               ),
                                         array(
                                               'legacy_id'    => 1,
                                               'sport_id'     => 1,
                                               'name'         => 'SS',
                                               'description'  => 'Position baseball',
                                               'legacy_stat_request'  => '2017-05-10 19:30:00',
                                               ),
                                         array(
                                               'legacy_id'    => 1,
                                               'sport_id'     => 1,
                                               'name'         => 'OF',
                                               'description'  => 'Position baseball',
                                               'legacy_stat_request'  => '2017-05-10 19:30:00',
                                               )
                                         ));

  }
}
