<!doctype html>
<html class="no-js" lang="en">
@include('layouts.style')

<body>
    @include('layouts.navigation')
    @include('layouts.login')
    @yield('content')
    @include('layouts.footer')
    @include('layouts.js')
    @yield('jsplus')
</body>
</html>