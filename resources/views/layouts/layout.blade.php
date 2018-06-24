<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
<body>
<div id="app" class="fix-header fix-sidebar card-no-border">

    @yield('content')
    
</div>

<!-- Scripts -->

@include('layouts.js-links')

</body>
</html>
