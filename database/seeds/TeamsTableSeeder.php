<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TeamsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = Faker::create();

    DB::table('teams')->insert(array(
                                     array(
                                           'legacy_id'      => '1',
                                           'stadium_id'     => '1',
                                           'name'           => 'New York Yankees ',
                                           'nickname'       => 'Yankees',
                                           'short_nickname' => 'NY',
                                           'logo'           => 'www.nyy.com',
                                           'president'      => 'Pedro Morales',
                                           'coach'          => 'José Blanco',
                                           'history'        => 'Historia de los Yankees',
                                           ),
                                     array(
                                           'legacy_id'      => '2',
                                           'stadium_id'     => '1',
                                           'name'           => 'Detroit Tigers',
                                           'nickname'       => 'Yankees',
                                           'short_nickname' => 'DET',
                                           'logo'           => 'www.nyy.com',
                                           'president'      => 'Mike Ilitch',
                                           'coach'          => 'Brad Ausmus',
                                           'history'        => 'Historia de Detroit',
                                           ),
                                     array(
                                           'legacy_id'      => '3',
                                           'stadium_id'     => '2',
                                           'name'           => 'Real Madrid C.F',
                                           'nickname'       => 'Real Madrid',
                                           'short_nickname' => 'RM',
                                           'logo'           => 'www.rm.com',
                                           'president'      => 'Pedro Morales',
                                           'coach'          => 'José Blanco',
                                           'history'        => 'Historia de los Yankees',
                                           ),
                                     ));
  }
}
