<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserTypesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

   DB::table('user_types')->insert(array(
                                         array(
                                               'name'         => 'Admin',
                                               'description'  => 'Super administrador'
                                               ),
                                         array(
                                               'name'         => 'affiliate',
                                               'description'  => 'Usuario que solo puede referir amigos y retirar dinero'
                                               ),
                                         array(
                                               'name'         => 'bettor',
                                               'description'  => 'Usuario que juega en fantasy cobra'
                                               )));
 }
}
