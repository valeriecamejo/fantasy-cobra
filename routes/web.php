<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@home');

Route::get('/landing', 'HomeController@landing');

Route::get('/logout', 'UserController@logout');

Route::get('/lobby', 'HomeController@home');

Route::get('usuario/ver-mis-competiciones', 'CompetitionController@bettor_competitions');
