<?php

namespace App\Lib\Ddh;
use Illuminate\Support\Facades\DB;

class SettingVariables {

  public static $settings = null;

  /**
   * @return object
   */
  static function retrieveSettingsDB() {
    if (self::$settings == null) {
      self::$settings = DB::table('settings')->get();

    }
  }

  /**
   * @param string $setting_required
   * @return string
   */
  public static function getSettings($setting_required) {
    self::retrieveSettingsDB();
    $return           = null;
    $setting_return   = self::$settings;
    foreach ($setting_return as $variable) {
      if ($variable->name == $setting_required) {
        $return = $variable->value;
      }
    }
    return $return;
  }
}

//  \App\Lib\Ddh\SettingVariables::getSettings('min_retiro')

