<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')

    <body class="font-sans antialiased">
        @include('layouts.navbar')
        @yield('content')
    </body>
</html>
