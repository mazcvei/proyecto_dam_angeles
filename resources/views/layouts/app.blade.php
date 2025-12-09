<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')
    @yield('post_head')

    <body class="font-sans antialiased">
        @include('layouts.navbar')
        @yield('content')
        @include('layouts.scripts')
        @yield('script')
        @include('layouts.footer')
    </body>
  

</html>
