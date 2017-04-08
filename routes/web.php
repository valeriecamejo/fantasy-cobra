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

Route::get('/', 'HomeController@home');

// Authenticate routes
Route::get('login','HomeController@home');
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');

//Register routes
Route::get('/registro',[
    'uses'  =>'Auth\RegisterController@showRegistrationForm',
    'as'    =>'register'
]);
Route::post('register','Auth\RegisterController@register');
Route::post('register-landing','Auth\RegisterController@register_landing');
Route::get('usuario/registro-exitoso','Auth\RegisterController@register_successfully');
Route::get('referido/{username}','Auth\RegisterController@show_registration_url');

//Home and landing routes
Route::get('/landing', 'HomeController@landing');
Route::get('/lobby', 'HomeController@home');
Route::get('/home', 'HomeController@home');

//General routes
Route::get('usuario/mis-competiciones', 'CompetitionController@bettor_competitions');
Route::get('usuario/mis-equipos', 'TeamUserController@bettor_teams');
Route::get('usuario/historial', 'HistoryController@history');
Route::get('usuario/perfil-usuario', 'UserController@show_user_profile');
Route::post('usuario/perfil-usuario', 'UserController@update_user_profile');
Route::get('usuario/referir-amigo', 'UserController@refer_friends');
Route::get('afiliado', 'UserController@refer_friends');
Route::post('usuario/invite_friends', 'UserController@invite_friends');
Route::get('/usuario/ver-promociones', 'PromotionController@list_promotions');
Route::get('/usuario/crear-competicion/{sport}/{championship}', 'CompetitionController@new_competition');
Route::post('/usuario/crear-competicion', 'CompetitionController@save_competition');
Route::get('usuario/obtener-premios', 'PrizeController@prize_min_user');