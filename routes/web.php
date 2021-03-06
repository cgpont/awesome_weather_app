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

Route::get('getcityweather/{cityId}', 'WeatherController@getCityWeather')->name('weather.getCityWeather');

Route::get('getcitieslistweather/{citiesIds}', 'WeatherController@getCitiesListWeather')->name('weather.getCitiesListWeather');

Route::get('getbestweathercity/{citiesIds}', 'WeatherController@getBestWeatherCity')->name('weather.getBestWeatherCity');
