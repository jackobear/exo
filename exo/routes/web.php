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

// Save as PNG
Route::get('/planet/save_as_png/{id}', 'PlanetController@save_as_png');
Route::get('/planet/save_all_as_png', 'PlanetController@save_all_as_png');
Route::get('/planet/fart', 'PlanetController@fart');

// Card views
Route::get('/card', 'CardController@view');
Route::get('/planet/{id}', 'PlanetController@show');
Route::get('/moon/{id}', 'MoonController@show');
Route::get('/star/{id}', 'StarController@show');
Route::get('/lifeform/{id}', 'LifeformController@show');
Route::get('/asteroid/{id}', 'AsteroidController@show');
Route::get('/action/{id}', 'ActionController@show');
Route::get('/faction/{id}', 'FactionController@show');


