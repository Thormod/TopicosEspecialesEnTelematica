<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');

//Search
Route::get('search/{criteria}', 'SearchController@searchForAll');

//Songs
Route::get('song/{id}', 'SongsController@index');
Route::get('buy/{id}', 'SongsController@buy');

//Users
Route::get('user/{id}','UserController@index');

//Genre
Route::get('genre/{id}','GenreController@index');

//Artist
Route::get('artist/{id}','ArtistController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
