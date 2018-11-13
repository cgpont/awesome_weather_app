<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Weather;

class WeatherController extends Controller
{

  /**
   * Gets the weather for a given city id.
   *
   * @param string  $cityId
   * @return \Illuminate\Http\Response
   */
  public function getCityWeather($cityId)
  {
    $cityWeather = Weather::getCityWeather($cityId);
    return view('bestcity')->with('$cityWeather', $cityWeather);
  }

  /**
   * Gets the weather for all given cities ids.
   *
   * @param string  $citiesIds
   * @return \Illuminate\Http\Response
   */
  public function getCitiesListWeather($citiesIds)
  {
    $citiesListWeather = Weather::getCitiesListWeather($citiesIds);
    return view('bestcity')->with('$citiesListWeather', $citiesListWeather);
  }

  /**
   * Gets the best weather from a list of given cities.
   *
   * @param string  $citiesIds
   * @return \Illuminate\Http\Response
   */
  public function getBestWeatherCity($citiesIds)
  {
    $bestWeatherCity = Weather::getBestWeatherCity($citiesIds);
    return view('bestcity')->with('bestWeatherCity', $bestWeatherCity);
  }

}
