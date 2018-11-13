<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client; //http://docs.guzzlephp.org

class Weather extends Model
{

  private static $apiUnits = 'metric';

  /**
   * Gets the weather for a given city id.
   * Uses library http://docs.guzzlephp.org
   *
   * @param string  $cityId
   * @return \Illuminate\Http\Response
   */
  public static function getCityWeather($cityId)
  {
    try {
        $client = new Client([
            'base_uri' => env('OPEN_MAPS_API_BASE_URL'),
            'timeout'  => 1.0,
        ]);
        $response = $client->request('GET',
                                     'weather',
                                     ['query' => ['id' => $cityId,
                                                  'units' => static::$apiUnits,
                                                  'appid' => env('OPEN_MAPS_API_ID')]
                                     ]);
        $cityWeatherInfo = json_decode($response->getBody()->getContents(), true);
        return $cityWeatherInfo;
    } catch(\Exception $e) {
        $errorResponse = array(
            "apiError" => "There was an error when trying to get the city weather from the API",
            "systemErrorMessage" => $e->getMessage(),
            "systemErrorFull" => $e,
        );
        return $errorResponse;
    }
  }

  /**
   * Gets the weather for all given cities ids.
   * Uses library http://docs.guzzlephp.org
   *
   * @param string  $citiesIds
   * @return \Illuminate\Http\Response
   */
  public static function getCitiesListWeather($citiesIds)
  {
    try {
      $client = new Client([
          'base_uri' => env('OPEN_MAPS_API_BASE_URL'),
          'timeout'  => 2.0,
      ]);
      $response = $client->request('GET',
                                   'group',
                                   ['query' => ['id' => $citiesIds,
                                                'units' => static::$apiUnits,
                                                'appid' => env('OPEN_MAPS_API_ID')]
                                   ]);
      $citiesListWeatherInfo = json_decode($response->getBody()->getContents(), true);
      return $citiesListWeatherInfo;
    } catch(\Exception $e) {
        $errorResponse = array(
            "apiError" => "There was an error when trying to get the cities weather from the API",
            "systemErrorMessage" => $e->getMessage(),
            "systemErrorFull" => $e,
        );
        return $errorResponse;
    }
  }

  /**
   * Gets the best weather from a list of given cities.
   *
   * @param string  $citiesIds
   * @return \Illuminate\Http\Response
   */
  public static function getBestWeatherCity($citiesIds)
  {
    $bestWeatherCity = [];
    $cities = self::getCitiesListWeather($citiesIds);    
    foreach ($cities['list'] as $city){
      if (empty($bestWeatherCity))
        $bestWeatherCity = $city;
      else {
        if ($city['main']['temp'] > $bestWeatherCity['main']['temp']){
          $bestWeatherCity = $city;
        }
      }
    }
    return $bestWeatherCity;
  }

}
