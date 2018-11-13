@extends('layouts.layout')
@section('content')
      <div class="best-weather m-t-md">
          The city with the best weather is {{$bestWeatherCity['name']}} ({{$bestWeatherCity['main']['temp']}}º)
      </div>

      <div class="best-weather m-t-md">
        <a href="../getbestweathercity/3128760,2911298,2960316,2735943,2509954" class="btn btn-default btn-lg" role="button" aria-pressed="true">
          Try Again
        </a>
      </div>
@stop
