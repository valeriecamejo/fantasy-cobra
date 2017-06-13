<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        \DB::table('settings')->insert(array(
            array(
            'name'            => 'min_deposit',
            'value'      => '1000',
            'description'       => 'Mínimo de dinero a depositar'
            ),
            array(
            'name'            => 'min_withdraw',
            'value'      => '2000',
            'description'       => 'Mínimo de dinero retirable'
            ),
            array(
            'name'            => 'start_date_history',
            'value'      => '2016-05-26',
            'description'       => 'Fecha de inicio de historiales'
            ),
            array(
            'name'            => 'max_deposit',
            'value'      => '50000',
            'description'       => 'Máximo de depósito en transacción'
            ),
            array(
            'name'            => 'max_daily',
            'value'      => '50000',
            'description'       => 'Máximo de dinero a depositar al día'
            ),
            array(
            'name'            => 'failed_attempts',
            'value'      => '5',
            'description'       => 'Máximo de intentos fallidos al depositar'
            ),
            array(
            'name'            => 'players_salary',
            'value'      => '50000',
            'description'       => 'Salario máximo de jugadores para crear equipo'
            ),
            array(
            'name'            => 'min_balance',
            'value'      => '10000',
            'description'       => 'Mínimo de dinero del balance para poder realizar un nuevo depósito'
            ),
        ));
    }
}
