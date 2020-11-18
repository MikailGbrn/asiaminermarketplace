<!doctype html>
<html class="no-js" lang="en">
@include('CompanyAdmin.fragment.style')

<body>
    @include('CompanyAdmin.fragment.navigation')
    @include('CompanyAdmin.fragment.login')
    @yield('content')
    <!-- @include('CompanyAdmin.fragment.footer') -->
    @include('CompanyAdmin.fragment.js')
    @yield('jsplus')
</body>
</html>