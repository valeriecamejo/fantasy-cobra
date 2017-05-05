<?php

namespace App\Lib\Ddh;
use Illuminate\Support\Facades\DB;

class SettingVariables {

  public static $settings;

  /**
   * @return object
   */
  public static function setting_variables() {

    self::$settings                 = DB::table('settings')->get();
    return self::$settings;
  }

  /**
   * @param string $setting_required
   * @return string
   */
  public static function getSettings($setting_required) {

    return self::$settings;
  }

}

// \App\Lib\Ddh\SettingVariables::getSettings('min_user');
