<!doctype html>
<html class="no-js" lang="en">
<head>
    @include('layouts.style')
    @yield('styleplus')
</head>

<body>
    @include('layouts.navigation')
    @include('layouts.login')
    @yield('content')
    @include('layouts.footer')
    @include('layouts.js')
    @yield('jsplus')
</body>
</html>