<?php

namespace App\Lib\Ddh;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class SettingVariables {

$settings
  static function setting_variables_return() {

    $settings                 = DB::table('settings')->get();

  }

  static function get($setting') {
    return $settings[$setting]
  }

}

//SettingVariables::get('min_deposito');
