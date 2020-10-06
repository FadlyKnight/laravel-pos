<!doctype html>
<html class="no-js" lang="">
    @include('layouts.dashboard.css')
    @yield('css')
<body>
    @include('layouts.dashboard.header')
    @include('layouts.dashboard.menu')

    @yield('content')

    @include('layouts.dashboard.footer')
    @include('layouts.dashboard.js')
    @yield('js')
</body>
</html>
