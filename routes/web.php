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
    return view('home.landing');
});

//Route::get('/landing', 'HomeController@landing');

Auth::routes();

Route::get('/landing', 'HomeController@landing');

Route::get('/logout', 'UserController@logout');

Route::get('/home', 'HomeController@lobby');
