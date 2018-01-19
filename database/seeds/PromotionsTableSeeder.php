<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PromotionsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = Faker::create();

    DB::table('promotions')->insert(array(
                                          array(
                                                'user_id'            =>  1,
                                                'name'               => '40% de bono si depositas más de 10.000 BS',
                                                'description'        => '40% de bono cada vez que hagas depósitos mayores a 10.000',
                                                'cost'               =>  null,
                                                'photo'              => 'Mas-de-50-10000-promo.jpg',
                                                'url'                => 'https://fantasycobra.com.ve/usuario/cajero',
                                                'web'                =>  1,
                                                'active'             =>  1,
                                                'order'              =>  1,
                                                'type'               =>  2,
                                                'min'                => 'NA',
                                                'max'                => 'NA',
                                                'rate'               =>  null,
                                                'deposit'            =>  null,
                                                'quantity'           =>  null,
                                                'code_promotional'   =>  null,
                                                'affiliate_min'      =>  null,
                                                'affiliate_max'      =>  null,
                                                'affiliate_rate'     =>  null,
                                                'affiliate_deposit'  =>  null,
                                                'affiliate_quantity' =>  null,
                                                'start_date'         =>  null,
                                                'end_date'           =>  null,
                                                ),
                                          array(
                                                'user_id'            =>  1,
                                                'name'               => 'Refiere amigos y gana Bs. 500 por su primer depósito',
                                                'description'        => 'Invita a tus panas y gana con ellos ',
                                                'cost'               =>  null,
                                                'photo'              => '20-refiere-amigo.jpg',
                                                'url'                => 'https://fantasycobra.com.ve/usuario/referir-amigo',
                                                'web'                =>  1,
                                                'active'             =>  1,
                                                'order'              =>  2,
                                                'type'               =>  4,
                                                'min'                =>  500,
                                                'max'                =>  50000,
                                                'rate'               =>  20,
                                                'deposit'            =>  1,
                                                'quantity'           =>  1,
                                                'code_promotional'   =>  null,
                                                'affiliate_min'      =>  null,
                                                'affiliate_max'      =>  null,
                                                'affiliate_rate'     =>  null,
                                                'affiliate_deposit'  =>  null,
                                                'affiliate_quantity' =>  null,
                                                'start_date'         =>  null,
                                                'end_date'           =>  null,
                                                ),
                                          array(
                                                'user_id'            =>  1,
                                                'name'               => '¡Que la fuerza te acompañe!',
                                                'description'        => '50% de bono en tu primer depósito',
                                                'cost'               => null,
                                                'photo'              => 'Star-Wars-50-272.png',
                                                'url'                => 'https://www.fantasycobra.com.ve/usuario',
                                                'web'                =>  1,
                                                'active'             =>  1,
                                                'order'              =>  3,
                                                'type'               =>  2,
                                                'min'                => 'NA',
                                                'max'                => 'NA',
                                                'rate'               =>  0,
                                                'deposit'            =>  1,
                                                'quantity'           =>  2,
                                                'code_promotional'   =>  null,
                                                'affiliate_min'      =>  null,
                                                'affiliate_max'      =>  null,
                                                'affiliate_rate'     =>  null,
                                                'affiliate_deposit'  =>  null,
                                                'affiliate_quantity' =>  null,
                                                'start_date'         =>  null,
                                                'end_date'           =>  null,
                                                ),

                                          ));
}
}
