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

 // Admin Routes
Route::group(['middleware' => ['permissions:8'], 'prefix' => 'admin' ], function () {
	Route::get('/', function() { // TODO: get this out of a closure!
		return view('admin.main');
	});

	// Menu Admin
	Route::get('/menu', 				'MenuController@index');
	Route::get('/menu/create', 			'MenuController@create');
	Route::get('/menu/edit/{menu}', 	'MenuController@edit');
	Route::post('/menu/store', 			'MenuController@store');
	Route::post('/menu/update/{menu}', 	'MenuController@update');
	Route::post('/menu/destroy/{menu}', 'MenuController@destroy');

	// Page Admin
	Route::get('/pages', 					'PageController@index');
	Route::get('/pages/create', 			'PageController@create');
	Route::get('/pages/edit/{page}', 		'PageController@edit');
	Route::post('/pages/store', 			'PageController@store');
	Route::post('/pages/update/{page}', 	'PageController@update');
	Route::post('/pages/destroy/{page}', 	'PageController@destroy');

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

	// User Admin
	Route::get('/user', 				'UserController@index');
	Route::get('/user/create', 			'UserController@create');
	Route::get('/user/edit/{user}', 	'UserController@edit');
	Route::post('/user/store', 			'UserController@store');
	Route::post('/user/update/{user}', 	'UserController@update');
	Route::post('/user/destroy/{user}', 'UserController@destroy');

	Route::group([ 'prefix' => 'events' ], function() {
		Route::get('/', 					'EventController@index');
		Route::get('/create', 				'EventController@create');
		Route::get('/edit/{event}', 		'EventController@edit');
		Route::post('/store', 				'EventController@store');
		Route::post('/update/{event}', 		'EventController@update');
		Route::post('/destroy/{event}', 	'EventController@destroy');
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
