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

Route::get('/', function () {
    return view('home.home');
});

Auth::routes();

Route::get('/landing', 'HomeController@landing');

Route::get('/logout', 'UserController@logout');

Route::get('/home', 'HomeController@lobby');

Route::get('home/{id}', 'BettorController@home');

//Route::post('register', 'Auth\RegisterController@showRegistrationForm');

//Route::get('registration', 'Auth\RegisterController@showRegistrationForm');


//Route::get('register_successfully', 'UserController@register_successfully');
