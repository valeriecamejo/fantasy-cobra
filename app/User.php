<?php

namespace App;

use Carbon\Carbon;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Request;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Referred_friend;
use Mail;

class User extends Authenticatable
{
  use HasApiTokens, Notifiable;

  protected $fillable = [
                         'id',
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
                         'date_last_connect',
                         'ip',
                         'remember_token'
                      ];

  const STATUS_ACTIVE   = 'ACTIVE';
  const STATUS_INACTIVE = 'INACTIVE';

  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
   * bettor the relationship with Bettor
   *
   */
  public function bettor(){
    return $this->hasOne('App\Bettor');

  }
  /**
   * bettor the relationship with Bettor
   *
   */
  public function affiliate(){
    return $this->hasOne('App\Affiliate');

  }
  /**
   * Register Post save User
   *
   * @param $input
   * @return object $user
   * @return boolean
   */
  public static function register($input) {
    $user                       = new User;
    $user->name                 = $input['name'];
    $user->last_name            = $input['last_name'];
    $user->user_type_id         = '3';
    $user->dni                  = $input['dni'];
    $user->email                = $input['email'];
    $user->username             = $input['username'];
    $user->phone                = $input['cod_country'] . '-' . $input['phone'];
    $user->password             = bcrypt($input['password']);
    $user->status               = User::STATUS_ACTIVE;
    $user->ip                   = request()->getClientIp();
    $user->date_last_connect    = Carbon::now()->toDateTimeString();

    if ($user->save()) {
      $bettor                   = new Bettor();
      $bettor->url_own          = "www.fantasycobra.com/referido/".$input['username'];
      $bettor->user_id          = $user->id;
      $bettor->photo            = "user_male.png";
      $bettor->city_id          = 1;

      $verify_referred_email    = User::verify_referred_email($input['email']);
      if ($verify_referred_email) {
        $bettor->refer_id = $verify_referred_email;
      }

      if (isset($input['username_referred'])) {
        $referred_url           = User::referred_url($input['username_referred']);
        $bettor->refer_id       = $referred_url;
      }

      if (isset($input['code_ref'])) {
        $is_referred_code_ref   = User::is_referred_code_ref($input['code_ref']);
        $bettor->code_referred  = $is_referred_code_ref;
      }

      if ($bettor->save()) {
        return $user;
      }
    }
  }

  /**
   * register_landing Post save User
   *
   * @param $input
   * @return object $user
   * @return boolean
   */
  public static function register_landing($input){
    $date                    = Carbon::now();
    $user                    = new User;
    $user->user_type_id      = '3';
    $user->email             = $input['email'];
    $user->username          = $input['username'];
    $user->password          = bcrypt($input['password']);
    $user->status            = User::STATUS_ACTIVE;
    $user->ip                = request()->getClientIp();
    $user->date_last_connect = $date->toDateTimeString();

    if ($user->save()) {

      $bettor                = new Bettor();
      $bettor->url_own       = "www.fantasycobra.com/referido/".$input['username'];
      $bettor->user_id       = $user->id;
      $bettor->photo         = "user_male.png";
      $bettor->city_id       = 1;

      $verify_referred_email    = User::verify_referred_email($input['email']);
      if ($verify_referred_email) {
        $bettor->refer_id = $verify_referred_email;
      }

      if ($bettor->save()) {
        return $user;
      }
    }
  }

  /**
   * is_referred_code_ref verify if code exist
   * in promotions or affiliate
   *
   * @param $code_ref
   * @return string $code_ref
   * @return boolean
   */
  private static function is_referred_code_ref($code_ref){

    $code_ref  = strtolower($code_ref);

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

  protected static function update_user_profile($input) {

              
    $user           = User::find(Auth::user()->id);
    $save           = false;

    $user->name  = $input['name'];
    $user->last_name    = $input['last_name'];
    $user->dni    = $input['dni'];
    $user->sex    = (int) $input['sex'];
    $user->phone  = "+" . $input['cod_country'] . '-' . $input['phone'];
    $user->save();
    $save = true;
    

      return $save;
  }

    protected static function update_user_password($input) {

    $old_password          = $input['old_password'];
    $password              = $input['password'];
    $password_confirmation = $input['password_confirmation'];
    $user           = User::find(Auth::user()->id);
    $save           = false;

    if( ($old_password != "") && ($password != "") ) {

        if (Hash::check($old_password, Auth::user()->password)) {

          $data = Input::all();

          $rules = array(
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6|same:password'
          );

          $validator = Validator::make($data, $rules);

          if ($validator->passes()) {
            $user->password = Hash::make($input['password']);
            $user->save();
            $save = true;
          }
        }
    }

      return $save;
  }

  protected function refer_friends() {

    $refer_friends = DB::table('referred_friends')
                   ->join('bettors', 'bettors.user_id', '=', 'referred_friends.user_id')
                   ->where('bettors.user_id', '=', Auth::user()->id)
                   ->get();

    return $refer_friends;
  }

  protected function invite_friends($input) {

    $email = $input['email'];
    $date  = date('Y-m-d H:i:s');

        $invite_friends = DB::table('referred_friends')
        ->where('referred_friends.email', '=', $email)
        ->count();

        if ($invite_friends == 0) {

          $referred          = new Referred_friend;
          $referred->user_id = Auth::user()->id;
          $referred->email   = $email;
          $referred->status  = 0;
          $referred->bonus   = 0;
          $referred->date    = $date;
          $referred->save();


      Mail::send('email.invite_friend', array('user' => Auth::user()), function ($message) use($email)
        {
            $message->to($email)
                    ->subject(Auth::user()->name." " .Auth::user()->surname." te invita a Fantasy Cobra");
        });

          return true;

        } else {

          return false;
        }
      }

  /**
   * verify_referred_email Verify if the user is
   * referred from the email
   * @param $email
   * @return integer $refer_id
   */
  private static function verify_referred_email($email) {
    $is_referred_email              = Referred_friend::where('email', '=', $email)
                                      ->first();
    if($is_referred_email) {
      $is_referred_email->status    = 1;
      $is_referred_email->save();
      $bettor_or_affiliate_referred = User::bettor_or_affiliate_referred ($is_referred_email->user_id);
      if($bettor_or_affiliate_referred){
        return $is_referred_email->user_id;
      }
    }
  }

  /**
   * verify_referred_email Verify if the user is
   * referred from the url
   * @param $username_referred
   * @return integer $refer_id
   */
  private static function referred_url($username_referred) {

    $id_owner_username              = User::where('username', '=', $username_referred)
                                            ->first();
    if($id_owner_username) {
      $bettor_or_affiliate_referred = User::bettor_or_affiliate_referred ($id_owner_username->id);

      if($bettor_or_affiliate_referred){
        return $id_owner_username->id;
      }
    }

  }

  /**
   * bettor_or_affiliate_referred Verify if bettor or affiliate
   * exist
   * @param $id
   * @return object $bettor_referred or $affiliate_referred
   */
  public static function bettor_or_affiliate_referred($id){
    $bettor_referred                    = Bettor::where('user_id', '=', $id)
      ->first();
    $affiliate_referred                 = Affiliate::where('user_id', '=', $id)
      ->first();

    if ($bettor_referred) {
      $bettor_referred->referred_friends = $bettor_referred->referred_friends + 1;
      $bettor_referred->save();

      return $bettor_referred;
    }elseif ($affiliate_referred){
      $affiliate_referred->referred_friends = $bettor_referred->referred_friends + 1;
      $affiliate_referred->save();

      return $affiliate_referred;
    }
  }
}
