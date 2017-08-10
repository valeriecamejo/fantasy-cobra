<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StatsApi\PlayerStatsApi;
use Illuminate\Support\Facades\Session;
use App\Console\Commands\DailyTasksCommand;

class StatController extends Controller
{

/**********************************
* Create a new controller instance.
* @param void
* @return void
***********************************/
public function __construct()
{
	$this->middleware('auth');
}

public function updateStats ( $statsWebHook ) {

	$route = 'webHook';
  PlayerStatsApi::saveUpdatePlayerStatsApi( $route, $statsWebHook );
}

}

