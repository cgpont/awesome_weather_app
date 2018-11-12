<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Awesome Weather App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .m-t-md {
                margin-top: 30px;
            }

            .best-weather {
              padding: 10px;
              font-weight: 600;
              color: #000;
            }

            .hidden-element{
              display: none;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Awesome Weather App
                </div>

                <div class="links">
                    <a href="https://openweathermap.org/city/3128760">Barcelona</a>
                    <a href="https://openweathermap.org/city/2911298">Hamburg</a>
                    <a href="https://openweathermap.org/city/2960316">Luxembourg</a>
                    <a href="https://openweathermap.org/city/2735943">Porto</a>
                    <a href="https://openweathermap.org/city/2509954">Valencia</a>
                </div>

                <div class="best-weather m-t-md">
                   <a href="getbestweathercity/3128760,2911298,2960316,2735943,2509954" class="btn btn-default btn-lg" role="button" aria-pressed="true">
                     Get the city with best weather
                   </a>
                </div>

                @if (Route::has('getbestweathercity'))
                  <div class="best-weather m-t-md hidden-element">
                      The city with the best weather is Valencia (20º)
                  </div>
                @endif

            </div>
        </div>
    </body>
</html>
