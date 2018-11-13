<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      @include('includes.head')
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                @include('includes.header')
                @yield('content')
                @include('includes.footer')
            </div>
        </div>
    </body>
</html>
