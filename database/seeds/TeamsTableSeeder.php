<?php

use Illuminate\Database\Seeder;
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

        \DB::table('teams')->insert(array(
            array(
                'stadium_id' => '1',
                'name'       => 'New York Yankees ',
                'nickname'   => 'Yankees',
                'logo'       => 'www.nyy.com',
                'president'  => 'Pedro Morales',
                'coach'      => 'José Blanco',
                'history'    => 'Historia de los Yankees',
            ),
            array(
                'stadium_id' => '2',
                'name'       => 'Real Madrid C.F',
                'nickname'   => 'Real Madrid',
                'logo'       => 'www.rm.com',
                'president'  => 'Pedro Morales',
                'coach'      => 'José Blanco',
                'history'    => 'Historia de los Yankees',
            ),
        ));
    }
}
