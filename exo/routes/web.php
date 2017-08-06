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
Route::get('/moon/save_all_as_png', 'MoonController@save_all_as_png');
Route::get('/asteroid/save_all_as_png', 'AsteroidController@save_all_as_png');
Route::get('/action/save_all_as_png', 'ActionController@save_all_as_png');
Route::get('/dwarf-planet/save_all_as_png', 'DwarfPlanetController@save_all_as_png');
Route::get('/habitable-world/save_all_as_png', 'HabitableWorldController@save_all_as_png');
Route::get('/faction/save_all_as_png', 'FactionController@save_all_as_png');
Route::get('/lifeform/save_all_as_png', 'LifeformController@save_all_as_png');
Route::get('/star/save_all_as_png', 'StarController@save_all_as_png');
Route::get('/reference-card/save_all_as_png', 'ReferenceCardController@save_all_as_png');
Route::get('/card-back/save_all_as_png', 'CardBackController@save_all_as_png');

// Card views
Route::get('/card', 'CardController@view');
Route::get('/planet/{id}', 'PlanetController@show');
Route::get('/moon/{id}', 'MoonController@show');
Route::get('/star/{id}', 'StarController@show');
Route::get('/lifeform/{id}', 'LifeformController@show');
Route::get('/asteroid/{id}', 'AsteroidController@show');
Route::get('/action/{id}', 'ActionController@show');
Route::get('/faction/{id}', 'FactionController@show');
Route::get('/dwarf-planet/{id}', 'DwarfPlanetController@show');
Route::get('/habitable-world/{id}', 'HabitableWorldController@show');
Route::get('/reference-card/{id}', 'ReferenceCardController@show');
Route::get('/card-back/{id}', 'CardBackController@show');


