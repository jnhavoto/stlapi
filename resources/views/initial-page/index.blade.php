@extends('layouts.layout')

@section('content')


    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        {{--<aside class="left-sidebar">--}}
            {{--<!-- Sidebar scroll-->--}}
            {{--<div class="scroll-sidebar">--}}
                {{--<!-- User profile -->--}}
                {{--<div class="user-profile" style="background: url({{ asset('theme/images/background/user-info.jpg') }}) no-repeat;">--}}
                    {{--<!-- User profile image -->--}}
                    {{--<div class="profile-img"> <img src="{{ asset('theme/images/users/profile.jpg') }}" alt="user" />--}}
                    {{--</div>--}}
                    {{--<!-- User profile text-->--}}
                    {{--<div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Markarn Doe</a>--}}
                        {{--<div class="dropdown-menu animated flipInY"> <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a> <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a> <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>--}}
                            {{--<div class="dropdown-divider"></div> <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>--}}
                            {{--<div class="dropdown-divider"></div> <a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a> </div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- End User profile text-->--}}
                {{--<!-- Sidebar navigation-->--}}
                {{--<nav class="sidebar-nav">--}}
                    {{--<ul id="sidebarnav">--}}
                        {{--<li class="nav-small-cap">PERSONAL</li>--}}
                        {{--<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>--}}
                            {{--<ul aria-expanded="false" class="collapse">--}}
                                {{--<li><a href="index.html">Dashboard 1</a></li>--}}
                                {{--<li><a href="index2.html">Dashboard 2</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i--}}
                                        {{--class="mdi mdi-email"></i><span class="hide-menu">Activities</span></a>--}}
                            {{--<ul aria-expanded="false" class="collapse">--}}
                                {{--<li><a href="/courses">Courses</a></li>--}}
                                {{--<li><a href="/assignments">Assignments </a></li>--}}
                                {{--<li><a href="/add-course">Add Course</a></li>--}}
                                {{--<li><a href="/add-assignment">Add Assignment</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i--}}
                                        {{--class="mdi mdi-bullseye"></i><span class="hide-menu">Communications</span></a>--}}
                            {{--<ul aria-expanded="false" class="collapse">--}}
                                {{--<li><a href="/calendar">Calendar</a></li>--}}
                                {{--<li><a href="app-contact.html">Contacts</a></li>--}}
                                {{--<li><a href="app-email.html">Notifications</a></li>--}}
                                {{--<li><a href="app-chat.html">Chats</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}

                    {{--</ul>--}}
                {{--</nav>--}}
                {{--<!-- End Sidebar navigation -->--}}
            {{--</div>--}}
            {{--<!-- End Sidebar scroll-->--}}
            {{--<!-- Bottom points-->--}}
            {{--<div class="sidebar-footer">--}}
                {{--<!-- item--><a href="#" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>--}}
                {{--<!-- item--><a href="#" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>--}}
                {{--<!-- item--><a href="#" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>--}}
            {{--</div>--}}
            {{--<!-- End Bottom points-->--}}
        {{--</aside>--}}
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                <div class="chart-text m-r-10">
                                    <h6 class="m-b-0"><small>THIS MONTH</small></h6>
                                    <h4 class="m-t-0 text-info">120</h4></div>
                                <div class="spark-chart">
                                    <div id="monthchart"></div>
                                </div>
                            </div>
                            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                <div class="chart-text m-r-10">
                                    <h6 class="m-b-0"><small>LAST MONTH</small></h6>
                                    <h4 class="m-t-0 text-primary">100</h4></div>
                                <div class="spark-chart">
                                    <div id="lastmonthchart"></div>
                                </div>
                            </div>
                            <div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap">
                                            <div>
                                                <h3 class="card-title">Assignment Overview</h3>
                                                <h6 class="card-subtitle">Finished vs Ongoing</h6> </div>
                                            <div class="ml-auto">
                                                <ul class="list-inline">
                                                    <li>
                                                        <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10 "></i>Ample</h6> </li>
                                                    <li>
                                                        <h6 class="text-muted  text-info"><i class="fa fa-circle font-10 m-r-10"></i>Pixel</h6> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="amp-pxl" style="height: 360px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">All Assignments </h3>
                                <h6 class="card-subtitle">Different stages</h6>
                                <div id="visitor" style="height:290px; width:100%;"></div>
                            </div>
                            <div>
                                <hr class="m-t-0 m-b-0">
                            </div>
                            <div class="card-body text-center ">
                                <ul class="list-inline m-b-0">
                                    <li>
                                        <h6 class="text-muted text-info"><i class="fa fa-circle font-10 m-r-10
"></i>Finihsed</h6> </li>
                                    <li>
                                        <h6 class="text-muted  text-primary"><i class="fa fa-circle font-10
                                        m-r-10"></i>Ongoing</h6> </li>
                                    <li>
                                        <h6 class="text-muted  text-success"><i class="fa fa-circle font-10
                                        m-r-10"></i>Late</h6> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    {{--<div class="col-lg-4 col-xlg-3 col-md-5">--}}
                        {{--<div class="card blog-widget">--}}
                            {{--<div class="card-body">--}}
                                {{--<div class="blog-image"><img src="{{ asset('theme/images/big/img1.jpg') }}" alt="img" class="img-responsive" /></div>--}}
                                {{--<h3>Business development new rules for 2017</h3>--}}
                                {{--<label class="label label-rounded label-success">Technology</label>--}}
                                {{--<p class="m-t-20 m-b-20">--}}
                                    {{--Lorem ipsum dolor sit amet, this is a consectetur adipisicing elit, sed do eiusmod tempor incididunt ut--}}
                                {{--</p>--}}
                                {{--<div class="d-flex">--}}
                                    {{--<div class="read"><a href="javascript:void(0)" class="link font-medium">Read More</a></div>--}}
                                    {{--<div class="ml-auto">--}}
                                        {{--<a href="javascript:void(0)" class="link m-r-10 " data-toggle="tooltip" title="Like"><i class="mdi mdi-heart-outline"></i></a> <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="Share"><i class="mdi mdi-share-variant"></i></a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap">
                                    <div>
                                        <h3 class="card-title">Assignments</h3>
                                        <h6 class="card-subtitle">Overview of Assignments</h6>
                                    </div>
                                    <div class="ml-auto align-self-center">
                                        <ul class="list-inline m-b-0">
                                            <li>
                                                <h6 class="text-muted text-success"><i class="fa fa-circle font-10
                                                m-r-10 "></i>Finished</h6> </li>
                                            <li>
                                                <h6 class="text-muted text-info"><i class="fa fa-circle font-10
                                                m-r-10"></i>Ongoing</h6> </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="campaign ct-charts"></div>
                                <div class="row text-center">
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h1 class="m-b-0 font-light">250</h1><small>Total Finished</small></div>
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h1 class="m-b-0 font-light">100</h1><small>Total Ongoing</small></div>
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h1 class="m-b-0 font-light">30</h1><small>Total Late</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                {{--<div class="row">--}}
                    {{--<!-- Column -->--}}
                    {{--<div class="col-lg-4 col-md-4">--}}
                        {{--<div class="card card-inverse card-primary">--}}
                            {{--<div class="card-body">--}}
                                {{--<div class="d-flex">--}}
                                    {{--<div class="m-r-20 align-self-center">--}}
                                        {{--<h1 class="text-white"><i class="ti-pie-chart"></i></h1></div>--}}
                                    {{--<div>--}}
                                        {{--<h3 class="card-title">Bandwidth usage</h3>--}}
                                        {{--<h6 class="card-subtitle">March  2017</h6> </div>--}}
                                {{--</div>--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-4 align-self-center">--}}
                                        {{--<h2 class="font-light text-white">50 GB</h2>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-8 p-t-10 p-b-20 align-self-center">--}}
                                        {{--<div class="usage chartist-chart" style="height:65px"></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- Column -->--}}
                    {{--<!-- Column -->--}}
                    {{--<div class="col-lg-4 col-md-4">--}}
                        {{--<div class="card card-inverse card-success">--}}
                            {{--<div class="card-body">--}}
                                {{--<div class="d-flex">--}}
                                    {{--<div class="m-r-20 align-self-center">--}}
                                        {{--<h1 class="text-white"><i class="icon-cloud-download"></i></h1></div>--}}
                                    {{--<div>--}}
                                        {{--<h3 class="card-title">Download count</h3>--}}
                                        {{--<h6 class="card-subtitle">March  2017</h6> </div>--}}
                                {{--</div>--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-4 align-self-center">--}}
                                        {{--<h2 class="font-light text-white">35487</h2>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-8 p-t-10 p-b-20 text-right">--}}
                                        {{--<div class="spark-count" style="height:65px"></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- Column -->--}}
                    {{--<!-- Column -->--}}
                    {{--<div class="col-lg-4 col-md-4">--}}
                        {{--<div class="card">--}}
                            {{--<img class="" src="{{ asset('theme/images/background/weatherbg.jpg') }}" alt="Card image cap">--}}
                            {{--<div class="card-img-overlay" style="height:110px;">--}}
                                {{--<h3 class="card-title text-white m-b-0 dl">New Delhi</h3>--}}
                                {{--<small class="card-text text-white font-light">Sunday 15 march</small>--}}
                            {{--</div>--}}
                            {{--<div class="card-body weather-small">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-8 b-r align-self-center">--}}
                                        {{--<div class="d-flex">--}}
                                            {{--<div class="display-6 text-info"><i class="wi wi-day-rain-wind"></i></div>--}}
                                            {{--<div class="m-l-20">--}}
                                                {{--<h1 class="font-light text-info m-b-0">32<sup>0</sup></h1>--}}
                                                {{--<small>Sunny Rainy day</small>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-4 text-center">--}}
                                        {{--<h1 class="font-light m-b-0">25<sup>0</sup></h1>--}}
                                        {{--<small>Tonight</small>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- Column -->--}}
                {{--</div>--}}
                <!-- Row -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <!-- Column -->
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('theme/images/background/profile-bg.jpg') }}" alt="Card image cap">
                            <div class="card-body little-profile text-center">
                                <div class="pro-img"><img src="{{ asset('theme/images/users/4.jpg') }}" alt="user" /></div>
                                <h3 class="m-b-0">{{$user->first_name.' '.$user->last_name}}</h3>
                                <p>Instructor</p>
                                {{--<a href="javascript:void(0)" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded">Follow</a>--}}
                                <div class="row text-center m-t-20">
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h3 class="m-b-0 font-light">5</h3><small>Courses</small></div>
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h3 class="m-b-0 font-light">10</h3><small>Assignments</small></div>
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h3 class="m-b-0 font-light">100</h3><small>Communications</small></div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="card">
                            <div class="card-body bg-info">
                                <h4 class="text-white card-title">My Contacts</h4>
                                <h6 class="card-subtitle text-white m-b-0 op-5">Checkout my contacts here</h6>
                            </div>
                            <div class="card-body">
                                <div class="message-box contact-box">
                                    <h2 class="add-ct-btn"><button type="button" class="btn btn-circle btn-lg btn-success waves-effect waves-dark">+</button></h2>
                                    <div class="message-widget contact-widget">
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="user-img"> <img src="{{ asset('theme/images/users/1.jpg') }}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">info@wrappixel.com</span></div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="user-img"> <img src="{{ asset('theme/images/users/2.jpg') }}" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Sonu Nigam</h5> <span class="mail-desc">pamela1987@gmail.com</span></div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="user-img"> <span class="round">A</span> <span class="profile-status away pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Arijit Sinh</h5> <span class="mail-desc">cruise1298.fiplip@gmail.com</span></div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="user-img"> <img src="{{ asset('theme/images/users/4.jpg') }}" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">kat@gmail.com</span></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Activity</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="card-body">
                                        <div class="profiletimeline">
                                            {{--<div class="sl-item">--}}
                                                {{--<div class="sl-left"> <img src="{{ asset('theme/images/users/1.jpg') }}" alt="user" class="img-circle"> </div>--}}
                                                {{--<div class="sl-right">--}}
                                                    {{--<div><a href="#" class="link">Annika Anderson</a> <span--}}
                                                                {{--class="sl-date">5--}}
                                                            {{--minutes ago</span>--}}
                                                        {{--<p>Submitted an assignment <a href="#"> Assignment 3</a></p>--}}
                                                        {{--<div class="row">--}}
                                                            {{--<div class="col-lg-3 col-md-6 m-b-20"><img src="{{ asset('theme/images/big/img1.jpg') }}" alt="user" class="img-responsive radius"></div>--}}
                                                            {{--<div class="col-lg-3 col-md-6 m-b-20"><img src="{{ asset('theme/images/big/img2.jpg') }}" alt="user" class="img-responsive radius"></div>--}}
                                                            {{--<div class="col-lg-3 col-md-6 m-b-20"><img src="{{ asset('theme/images/big/img3.jpg') }}" alt="user" class="img-responsive radius"></div>--}}
                                                            {{--<div class="col-lg-3 col-md-6 m-b-20"><img src="{{ asset('theme/images/big/img4.jpg') }}" alt="user" class="img-responsive radius"></div>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="like-comm"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<hr>--}}
                                            {{--<div class="sl-item">--}}
                                                {{--<div class="sl-left"> <img src="{{ asset('theme/images/users/2.jpg') }}" alt="user" class="img-circle"> </div>--}}
                                                {{--<div class="sl-right">--}}
                                                    {{--<div> <a href="#" class="link">Annika Anderson</a> <span class="sl-date">5 minutes ago</span>--}}
                                                        {{--<div class="m-t-20 row">--}}
                                                            {{--<div class="col-md-3 col-xs-12"><img src="{{ asset('theme/images/big/img1.jpg') }}" alt="user" class="img-responsive radius"></div>--}}
                                                            {{--<div class="col-md-9 col-xs-12">--}}
                                                                {{--<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. </p> <a href="#" class="btn btn-success"> Design weblayout</a></div>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<hr>--}}
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="{{ asset('theme/images/users/3.jpg') }}" alt="user" class="img-circle"> </div>
                                                <div class="sl-right">
                                                    <div><a href="#" class="link">Annika Anderson</a> <span class="sl-date">5 minutes ago</span>
                                                        <p class="m-t-10"> I am late submitting my feedback. Sorry! </p>
                                                    </div>
                                                    <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="{{ asset('theme/images/users/4.jpg') }}" alt="user" class="img-circle"> </div>
                                                <div class="sl-right">
                                                    <div><a href="#" class="link">{{$user->first_name.' '.$user->last_name}}</a> <span
                                                                class="sl-date">5
                                                            minutes ago</span>
                                                        <blockquote class="m-t-10">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--second tab-->
                                <div class="tab-pane" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted">{{$user->first_name.' '.$user->last_name}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted">{{$user->telephone}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">{{$user->email}}</p>
                                            </div>
                                            {{--<div class="col-md-3 col-xs-6"> <strong>Location</strong>--}}
                                                {{--<br>--}}
                                                {{--<p class="text-muted">{{$user->first_name.' '.$user->last_name}}</p>--}}
                                            {{--</div>--}}
                                        </div>
                                        <hr>
                                        <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                                        <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        <h4 class="font-medium m-t-30">Skill Set</h4>
                                        <hr>
                                        <h5 class="m-t-30">Teaching <span class="pull-right">80%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">Research <span class="pull-right">90%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">Other skills <span class="pull-right">50%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">Programming <span class="pull-right">70%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Ake Gronlund" class="form-control
                                                    form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" placeholder="ake.gronlund@oru.se"
                                                           class="form-control form-control-line" name="example-email" id="example-email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" value="password" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="123 456 7890" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Message</label>
                                                <div class="col-md-12">
                                                    <textarea rows="5" class="form-control form-control-line"></textarea>
                                                </div>
                                            </div>
                                            {{--<div class="form-group">--}}
                                                {{--<label class="col-sm-12">Select City</label>--}}
                                                {{--<div class="col-sm-12">--}}
                                                    {{--<select class="form-control form-control-line">--}}
                                                        {{--<option>Orebro</option>--}}
                                                        {{--<option>Stockholm</option>--}}
                                                        {{--<option>Uppsala</option>--}}
                                                        {{--<option>Lund</option>--}}
                                                    {{--</select>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('theme/images/users/1.jpg') }}" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('theme/images/users/2.jpg') }}" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('theme/images/users/3.jpg') }}" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('theme/images/users/4.jpg') }}" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('theme/images/users/5.jpg') }}" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('theme/images/users/6.jpg') }}" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('theme/images/users/7.jpg') }}" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('theme/images/users/8.jpg') }}" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            {{--<footer class="footer"> © 2018 Material Pro Admin by wrappixel.com </footer>--}}
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->

@endsection