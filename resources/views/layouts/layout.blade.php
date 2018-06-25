<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<<<<<<< HEAD
    <title>{{ config('app.name', 'Stl-Teacher') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('theme/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('theme/plugins/node-waves/waves.css') }}" rel="stylesheet"/>

    <!-- Animation Css -->
    <link href="{{ asset('theme/plugins/animate-css/animate.css') }}" rel="stylesheet"/>

    <!-- Morris Chart Css-->
    <link href="{{ asset('theme/plugins/morrisjs/morris.css') }}" rel="stylesheet"/>

    <!-- Custom Css -->
    <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('theme/css/themes/all-themes.css') }}" rel="stylesheet"/>

</head>
<body class="theme-red">
<div id="app">

    @include('layouts.preloader-search')

    @include('layouts.cabecalho')

    <main class="py-4">
        @yield('content')
    </main>

    @include('layouts.js-links')
</div>
=======
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('theme/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{ asset('theme/plugins/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/plugins/chartist-js/dist/chartist-init.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}"
          rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="{{ asset('theme/plugins/c3-master/c3.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('theme/css/colors/blue.css') }}" id="theme" rel="stylesheet">

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

</head>
<body class="fix-header fix-sidebar card-no-border">


<div class="blue-theme">

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </div>

    @include('layouts.header')

    @yield('content')

</div>


<!-- Scripts -->

@include('layouts.js-links')
@include('layouts.leftsidebar')

>>>>>>> 295d75aa0c2291c9160945b1239640761e56ecc1
</body>
</html>
