<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
     <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
        @guest
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="m-5">
                        @yield('auth')
                    </div>
                </div>
            </div>
            
        @else
            <!-- Header Status-->
            @include('layouts.header')
            <div class="app-body">
                <!-- Sidebar Here -->
                @include('layouts.sidebar')

                <!-- Content -->
                <main class="main">
                    <div class="m-3 animated fadeIn delay-1s">
                        @yield('content')
                    </div>
                </main>
            </div>
        @endguest
        @include('layouts.footer')
</body>
</html>

