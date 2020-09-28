<!doctype html>
<html class="no-js" lang="en">
@include('layouts.style')

<body>
    @include('layouts.navigation')
    @yield('content')
    @include('layouts.footer')
    @include('layouts.js')
</body>
</html>