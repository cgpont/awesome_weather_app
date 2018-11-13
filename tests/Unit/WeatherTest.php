<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Weather;

class WeatherTest extends TestCase
{

    /**
     * Test getCityWeather function.
     *
     * @return void
     */
    public function testGetCityWeather()
    {
        $cityWeatherInfo = Weather::getCityWeather('3128760');
        $this->assertEquals('Barcelona', $cityWeatherInfo['name']);

        $cityWeatherInfo = Weather::getCityWeather('2911298');
        $this->assertEquals('Hamburg', $cityWeatherInfo['name']);

        $cityWeatherInfo = Weather::getCityWeather('2960316');
        $this->assertEquals('Luxembourg', $cityWeatherInfo['name']);

        $cityWeatherInfo = Weather::getCityWeather('2735943');
        $this->assertEquals('Porto', $cityWeatherInfo['name']);

        $cityWeatherInfo = Weather::getCityWeather('2509954');
        $this->assertEquals('Valencia', $cityWeatherInfo['name']);
    }

    /**
     * Test getCitiesListWeather function.
     *
     * @return void
     */
    public function testGetCitiesListWeather()
    {
        $citiesWeatherInfo = Weather::getCitiesListWeather('3128760,2911298,2960316,2735943,2509954');
        $this->assertEquals('Barcelona', $citiesWeatherInfo[0]['name']);
        $this->assertEquals('Hamburg', $citiesWeatherInfo[1]['name']);
        $this->assertEquals('Luxembourg', $citiesWeatherInfo[2]['name']);
        $this->assertEquals('Porto', $citiesWeatherInfo[3]['name']);
        $this->assertEquals('Valencia', $citiesWeatherInfo[4]['name']);
    }

    /**
     * Test getBestWeatherCity function.
     *
     * @return void
     */
    public function testGetBestWeatherCity()
    {
        $bestCityWeatherInfo = Weather::getBestWeatherCity('3128760,2911298,2960316,2735943,2509954');
        $this->assertInternalType("string", $bestCityWeatherInfo['name']);
        $this->assertInternalType("float", $bestCityWeatherInfo['temperature']);
    }

}
