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

Route::get('/', 'HomeController@home')->name('home');

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

//*****************************General routes*********************************//


Route::group(['middleware' => ['auth']], function () {
    //User routes.
	Route::get('usuario/mis-competiciones', 'CompetitionController@bettor_competitions');
	Route::get('usuario/mis-equipos', 'TeamUserController@bettor_teams');
	Route::get('usuario/historial', 'HistoryController@history');
	Route::get('usuario/perfil-usuario', 'UserController@show_user_profile');
	Route::post('usuario/perfil-usuario', 'UserController@update_user_profile');
	Route::get('usuario/referir-amigo', 'UserController@refer_friends');
	Route::post('usuario/invite_friends', 'UserController@invite_friends');
	Route::get('/usuario/ver-promociones', 'PromotionController@list_promotions');
	Route::get('/usuario/crear-competicion/{sport}/{championship}', 'CompetitionController@new_competition');
	Route::post('/usuario/crear-competicion', 'CompetitionController@save_competition');
	Route::get('usuario/obtener-premios', 'PrizeController@prize_min_user');
	Route::get('/usuario/crear-equipo/{type}', 'TeamUserController@new_team');
	Route::post('/usuario/crear-equipo', 'TeamUserController@save_team');
	Route::get('usuario/obtener-jugadores', 'TeamUserController@players');
	Route::get('usuario/ver-equipos', 'TeamUserController@team_data');
	Route::get('user-teams', 'TeamUserController@teams_by_user');
	Route::get('usuario/competicion', 'CompetitionController@modal_competition');
	Route::post('usuario/editar-equipo', 'TeamUserController@show_team');
	Route::get('usuario/editar-equipo', 'TeamUserController@update_team_players');
	Route::get('usuario/crear-equipo/competicion/{id}', 'CompetitionController@new_team_competition')	;
	Route::get('usuario/inscribir-equipo/competicion/{id}', '	CompetitionController@enroll_team_competition');
	Route::get('competition-details', 'CompetitionController@competitionDetailsOfCookie');
	Route::get('usuario/retirar-dinero', 'PaymentController@show_withdrawals');
	Route::post('usuario/retirar-dinero', 'PaymentController@withdrawal');
	Route::get('usuario/depositar-dinero', 'PaymentController@show_transfers');
	Route::post('usuario/depositar-dinero', 'PaymentController@transfer');
	Route::get('usuario/depositar-tdc', 'PaymentController@show_tdcs');
	Route::post('usuario/depositar-tdc', 'PaymentController@tdc');
	Route::post('usuario/guardar-equipo', 'TeamUserController@save_team_edited');
	Route::get('usuario/cambiar-password','Auth\ChangePasswordController@show_change_password_form')	->name('changePassword');
	Route::post('usuario/cambiar-password','Auth\ChangePasswordController@change_password')->name('	changePassword');
});


//Players routes
Route::get('player/position/{position}', 'PlayerController@byPosition');
Route::get('player/journey/{championship}/{date}', 'PlayerController@byjourney');
Route::get('player/team/{team_id}', 'PlayerController@playersByTeam');

//Affiliate routes
Route::get('afiliado', 'UserController@refer_friends');

//Views footer routes
Route::get('/terminos-y-servicios', 'HomeController@terms_services');
Route::get('/politicas-de-privacidad', 'HomeController@politics_privacy');
Route::get('/como-jugar', 'HomeController@how_to_play');
Route::get('/reglas', 'HomeController@rules');
Route::get('/puntos', 'HomeController@score');

//Web Hook
 // Route::get('/stats/{statsWebHook}', 'StatController@updateStats');
 // Route::post('/stats', 'StatController@updateStats');


// Route::get('/redirect', function () {

//     $query = http_build_query([
//         'client_id' => '2',
//         'redirect_uri' => 'http://localhost:8000',
//         'response_type' => 'code',
//         'scope' => '*'
//     ]);

//     return redirect('http://localhost:8000/oauth/authorize?'.$query);
// });

// Route::get('/callback', function (Illuminate\Http\Request $request) {
//     $http = new \GuzzleHttp\Client;

//     $response = $http->post('http://localhost:8000/oauth/token', [
//         'form_params' => [
//             'client_id' => '2',
//             'client_secret' => 'bGefpqEyg36N7J8ovhofffHv0w65ADN5GAXj4QFh',
//             'grant_type' => 'authorization_code',
//             'redirect_uri' => 'http://localhost:8000',
//             'code' => $request->code,
//         ],
//     ]);
//     return json_decode((string) $response->getBody(), true);
// });

