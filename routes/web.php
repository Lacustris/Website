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
    return view('welcome');
});

Auth::routes(); // TODO: Look into changing this to custom routes, since not everything will be used

Route::get('/page/{page}', 'PageController@show');
Route::get('/post/{post}', 'PostController@show');

 // Admin Routes
Route::get('/admin', function() { // TODO: get this out of a closure!
	return view('admin.main');
})->middleware('permissions:8');

// Menu Admin
Route::get('/admin/menu', 					'MenuController@index');
Route::get('/admin/menu/create', 			'MenuController@create');
Route::get('/admin/menu/edit/{menu}', 		'MenuController@edit');
Route::post('/admin/menu/store', 			'MenuController@store');
Route::post('/admin/menu/update/{menu}', 	'MenuController@update');
Route::post('/admin/menu/destroy/{menu}', 	'MenuController@destroy');

// Page Admin
Route::get('/admin/pages', 					'PageController@index');
Route::get('/admin/pages/create', 			'PageController@create');
Route::get('/admin/pages/edit/{page}', 		'PageController@edit');
Route::post('/admin/pages/store', 			'PageController@store');
Route::post('/admin/pages/update/{page}', 	'PageController@update');
Route::post('/admin/pages/destroy/{page}', 	'PageController@destroy');

// Posts Admin
Route::get('/admin/posts', 					'PostController@index');
Route::get('/admin/posts/create', 			'PostController@create');
Route::get('/admin/posts/edit/{post}', 		'PostController@edit');
Route::post('/admin/posts/store', 			'PostController@store');
Route::post('/admin/posts/update/{post}', 	'PostController@update');
Route::post('/admin/posts/destroy/{post}', 	'PostController@destroy');

// User Admin
Route::get('/admin/user', 					'UserController@index');
Route::get('/admin/user/create', 			'UserController@create');
Route::get('/admin/user/edit/{user}', 		'UserController@edit');
Route::post('/admin/user/store', 			'UserController@store');
Route::post('/admin/user/update/{user}', 	'UserController@update');
Route::post('/admin/user/destroy/{user}', 	'UserController@destroy');

// Media
Route::get('/media/index',		'MediaController@index');
Route::get('/media/test',		'MediaController@test');
Route::get('/media/pagination',	'MediaController@pagination');
Route::post('/media/upload', 	'MediaController@upload');
