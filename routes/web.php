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

Route::get('/', 			'PostController@recent');
Route::get('/post/{post}', 	'PostController@show');

Route::get('/join', 'HomeController@join');
Route::post('/join', 'HomeController@doJoin');

// Authentication routes
Auth::routes(); // TODO: Look into changing this to custom routes, since not everything will be used -- Maybe solved by removing them from the controllers

Route::get('/page/{page}', 'PageController@show');

// Events
Route::get('/calendar/{month?}/{year?}', 	'EventController@calendar'); // TODO: put guard on month and year value
Route::get('/event/{event}', 				'EventController@show');

// Competitions
Route::get('/competitions', 'CompetitionController@competitionIndex');

// User-only Routes
Route::group([ 'middleware' => ['auth'] ], function() {
	Route::get('/event/join/{event}', 			'EventController@join');
	Route::get('/event/participants/{event}', 	'EventController@participants');
});

// Admin Routes
Route::group(['middleware' => ['permissions:7'], 'prefix' => 'admin' ], function () {
	Route::get('/', function() { // TODO: get this out of a closure!
		return view('admin.main');
	});

	// Menu Admin
	Route::group([ 'middleware' => ['permissions:7'], 'prefix' => 'menu'], function() {
		Route::get('/', 				'MenuController@index');
		Route::get('/create', 			'MenuController@create');
		Route::get('/edit/{menu}',	 	'MenuController@edit');
		Route::get('/up/{menu}', 		'MenuController@up');
		Route::get('/down/{menu}', 		'MenuController@down');
		Route::get('/visibility/{menu}','MenuController@toggleVisibility');
		Route::post('/store', 			'MenuController@store');
		Route::post('/update/{menu}', 	'MenuController@update');
		Route::post('/destroy/{menu}', 	'MenuController@destroy');
	});

	// Page Admin
	Route::group([ 'middleware' => ['permissions:7'], 'prefix' => 'pages' ], function() {
		Route::get('/', 				'PageController@index');
		Route::get('/create', 			'PageController@create');
		Route::get('/edit/{page}', 		'PageController@edit');
		Route::post('/store', 			'PageController@store');
		Route::post('/update/{page}', 	'PageController@update');
		Route::post('/destroy/{page}', 	'PageController@destroy');
	});

	// Posts Admin
	Route::get('/posts', 					'PostController@index');
	Route::get('/posts/create', 			'PostController@create');
	Route::get('/posts/edit/{post}', 		'PostController@edit');
	Route::post('/posts/store', 			'PostController@store');
	Route::post('/posts/update/{post}', 	'PostController@update');
	Route::post('/posts/destroy/{post}', 	'PostController@destroy');

	// Sponsor Admin
	Route::group([ 'prefix' => 'sponsors' ], function() {
		Route::get('/', 					'SponsorController@index');
		Route::get('/create', 				'SponsorController@create');
		Route::get('/edit/{sponsor}', 		'SponsorController@edit');
		Route::post('/store', 				'SponsorController@store');
		Route::post('/update/{sponsor}', 	'SponsorController@update');
		Route::post('/destroy/{sponsor}', 	'SponsorController@destroy');
	});

	Route::group(['middleware' => ['permissions:8'], 'prefix' => 'user' ], function () {
		// User Admin
		Route::get('/', 				'UserController@index');
		Route::get('/create', 			'UserController@create');
		Route::get('/edit/{user}', 		'UserController@edit');
		Route::post('/store', 			'UserController@store');
		Route::post('/update/{user}', 	'UserController@update');
		Route::post('/destroy/{user}', 	'UserController@destroy');
	});

	// Event Admin
	Route::group([ 'prefix' => 'events' ], function() {
		Route::get('/', 					'EventController@index');
		Route::get('/create', 				'EventController@create');
		Route::get('/edit/{event}', 		'EventController@edit');
		Route::post('/store', 				'EventController@store');
		Route::post('/update/{event}', 		'EventController@update');
		Route::post('/destroy/{event}', 	'EventController@destroy');
	});

	// Competition Admin
	Route::group([ 'prefix' => 'competitions'], function() {
		Route::get('/', 						'CompetitionController@index');
		Route::get('/create', 					'CompetitionController@create');
		Route::get('/edit/{competition}', 		'CompetitionController@edit');
		Route::post('/store', 					'CompetitionController@store');
		Route::post('/update/{competition}', 	'CompetitionController@update');
		Route::post('/destroy/{competition}', 	'CompetitionController@destroy');
	});
});

// Media
Route::get('/media/index',		'MediaController@index');
Route::get('/media/test',		'MediaController@test');
Route::get('/media/pagination',	'MediaController@pagination');
Route::get('/media/sponsors',	'MediaController@sponsors');
Route::post('/media/upload', 	'MediaController@upload'); // THIS SHOULD BE PROTECTED

// Language Configuration
Route::get('/language/{locale}', function ($locale) {
    if($locale == 'en' || 'nl') {
		session( ['appLanguage' => $locale] );
	}

	return redirect()->back();
});
