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

Route::get('/', 'HomeController@lobby');

// Authenticate routes
Route::get('login','UserController@login');
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');

//Register routes
Route::get('registro',[
    'uses'  =>'Auth\RegisterController@showRegistrationForm',
    'as'    =>'register'
]);
Route::post('register','Auth\RegisterController@register');


Route::get('/landing', 'HomeController@landing');

Route::get('/logout', 'UserController@logout');

Route::get('/lobby', 'HomeController@lobby');
Route::get('/home', 'HomeController@lobby');
