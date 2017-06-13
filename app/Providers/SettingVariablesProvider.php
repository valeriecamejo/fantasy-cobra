<?php

namespace App\Providers;

use App\Lib\Ddh\SettingVariables;
use Illuminate\Support\ServiceProvider;

class SettingVariablesProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
      view()->composer('view', function () {
        //
      });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('\App\Lib\Ddh\SettingVariables', function () {
        return new SettingVariables();
      });

    }
}
