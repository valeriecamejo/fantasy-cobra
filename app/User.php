<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'user_type_id',
        'name',
        'last_name',
        'username',
        'password',
        'phone',
        'status',
        'email',
        'sex',
        'dni',
        'ip',
        'date_last_connect',
        'remember_token'
    ];

    const STATUS_ACTIVE   = 'ACTIVE';
    const STATUS_INACTIVE = 'INACTIVE';

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Register Post save User
     *
     * @param $input
     * @return object $user
     * @return boolean
     */
    public static function register($input)
    {
        $user = new User;
        $user->name = $input['name'];
        $user->last_name = $input['last_name'];
        $user->user_type_id = '3';
        $user->dni = $input['dni'];
        $user->email = $input['email'];
        $user->username = $input['username'];
        $user->phone = $input['cod_country'] . '-' . $input['phone'];
        $user->password = bcrypt($input['password']);
        $user->status = User::STATUS_ACTIVE;
        $user->ip = '192.168.0.1';
        $user->date_last_connect = '2017-02-01 08:00:00';

        if ($user->save()) {

            $bettor = new Bettor();
            $bettor->url_own = "www.fantasycobra.com/referido/" . $input['username'];
            $bettor->user_id = $user->id;
            $bettor->photo = "user_male.png";
            $bettor->city_id = 1;

            if (empty($input['code_ref'])) {
                $bettor->code_referred = false;
            } else {
                $is_referred_code_ref = User::is_referred_code_ref($input['code_ref']);
                $bettor->code_referred = $is_referred_code_ref;
            }
            if ($bettor->save()) {
                return $user;
            } else {
                return false;
            }
        }else{
            return false;
        }
    }

    private static function is_referred_code_ref($code_ref){

        $code_ref = strtolower($code_ref);

        $promotion = Promotion::find_promotion_code($code_ref);

        $affiliate = Affiliate::find_affiliate_code($code_ref);

        if($promotion == true){
            return $code_ref;
        }elseif($affiliate == true){
            return $code_ref;
        }else{
            return false;
        }
    }
}
