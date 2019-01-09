<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

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

    <!-- Calendar CSS -->
    <link href="{{ asset('theme/plugins/calendar/dist/fullcalendar.css')}}" rel="stylesheet"/>

    <!-- Footable CSS -->
    <link href="{{ asset('theme/plugins/footable/css/footable.core.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet"/>

    {{--Dropzone--}}
    {{--<link href="{{ asset('css/dropzone.css')}}" rel="stylesheet"/>--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css" rel="stylesheet">


    {{--SELECT 2--}}
    <link href="{{ asset('css/select2.min.css')}}" rel="stylesheet"/>

    <script src="{{ asset('theme/plugins/jquery/jquery.min.js') }}"></script>

    {{--<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">--}}

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
@include('layouts.leftsidebar_admin')


</body>
{{--SELECT 2--}}
</html>
