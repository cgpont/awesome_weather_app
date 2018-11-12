<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{

  private $apiBaseUrl = 'http://api.openweathermap.org/data/2.5/';
  private $apiId = 'baede2b33660a266dfd0fb33470868a0';

  /**
   * Gets the weather for a given city.
   *
   * @param string  $cityId
   * @return \Illuminate\Http\Response
   */
  public function getCityWeather($cityId)
  {
    try {
        $client = new Client([
            'base_uri' => $this->apiBaseUrl,
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET',
                                     'weather',
                                     ['query' => ['id' => $cityId,
                                                  'appid' => $this->apiId]
                                     ]);
        $response = $response->getBody()->getContents();
        return $response;
    } catch(\Exception $e) {
        $errorResponse = array(
            "apiError" => "There was an error when trying to get the weather from the API",
            "systemErrorMessage" => $e->getMessage(),
            "systemErrorFull" => $e,
        );
        return $errorResponse;
    }
  }
}
