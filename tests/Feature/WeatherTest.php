<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WeatherTest extends TestCase
{
    /**
     * Test main page.
     *
     * @return void
     */
    public function testMainPage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Test getbestweathercity page.
     *
     * @return void
     */
    public function testGetbestweathercityPage()
    {
        $response = $this->get('getbestweathercity/3128760,2911298,2960316,2735943,2509954');
        $response->assertStatus(200);
    }
}
