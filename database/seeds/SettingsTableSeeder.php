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
            'name'            => 'min_deposito',
            'value'      => '1000',
            'description'       => 'Mínimo de dinero a depositar'
            ),
            array(
            'name'            => 'min_retiro',
            'value'      => '2000',
            'description'       => 'Mínimo de dinero retirable'
            ),
            array(
            'name'            => 'fecha_inicio_historiales',
            'value'      => '2016-05-26',
            'description'       => 'Fecha de inicio de historiales'
            ),
            array(
            'name'            => 'max_deposito',
            'value'      => '50000',
            'description'       => 'Máximo de depósito en transacción'
            ),
            array(
            'name'            => 'max_diario',
            'value'      => '50000',
            'description'       => 'Máximo de dinero a depositar al día'
            ),
            array(
            'name'            => 'intentos_fallidos',
            'value'      => '5',
            'description'       => 'Máximo de intentos fallidos al depositar'
            ),
            array(
            'name'            => 'salario_players',
            'value'      => '50000',
            'description'       => 'Salario máximo de players para crear equipo'
            ),
            array(
            'name'            => 'min_balance',
            'value'      => '10000',
            'description'       => 'Mínimo de dinero del balance para poder realizar un nuevo depósito'
            ),
        ));
    }
}
