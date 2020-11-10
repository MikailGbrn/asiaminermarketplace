<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title>Indomining Marketplace</title>
        @include('admin.fragment-admin.style')

    </head>
    @include('admin.fragment-admin.navigation')

    <body style="background-color: #e9e9e9;">
    <main>
    
    @yield('content')
    
    </main>

    @include('admin.fragment-admin.js')
    @yield('jsplus')
</body>
</html>