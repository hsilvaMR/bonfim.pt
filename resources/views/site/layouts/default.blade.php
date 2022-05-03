<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('site/includes/head')

        @yield('css')
    </head>
    <body>
        @include('site/includes/header')

        @yield('content')

        @include('site/includes/footer')

        @include('site/includes/assets')

        @yield('javascript')
    </body>
</html>