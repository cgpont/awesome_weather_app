<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Awesome Weather App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/awa.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

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
                    The city with the best weather is {{$bestWeatherCity['name']}} ({{$bestWeatherCity['main']['temp']}}º)
                </div>

                <div class="best-weather m-t-md">
                  <a href="../getbestweathercity/3128760,2911298,2960316,2735943,2509954" class="btn btn-default btn-lg" role="button" aria-pressed="true">
                    Try Again
                  </a>
                </div>

            </div>
        </div>
    </body>
</html>
