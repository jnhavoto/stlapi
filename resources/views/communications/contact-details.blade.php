@extends('layouts.layout')
@section('content')
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
                    <h3 class="text-themecolor m-b-0 m-t-0">{{ __('strings.UserDetails') }}</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/users">{{ __('strings.Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('strings.UserDetails') }}</li>
                    </ol>
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
                <div class="col-lg-3 col-xlg-2 col-md-4">
                    <div class="card">
                        {{--<div class="card-img-overlay card-inverse social-profile d-flex ">--}}
                        {{--<div class="card-img-top card-inverse social-profile d-flex ">--}}
                        <img class="card-img-top" src="{{ asset('theme/images/users/person.png') }}"
                             alt="Card image cap">
                        {{--<div class="align-self-center profile-img"> <img src="{{ asset('theme/images/users/person.png') }}" clalign-self-center profile-imgass="img-circle" width="100">--}}
                        <div class="card-body">
                            <h4 class="card-title align-self-center">{{$userdata->first_name.' '.$userdata->last_name}}</h4>
                            {{--<h6 class="card-subtitle">{{$userdata->email}}</h6>--}}
                            {{--<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>--}}
                        </div>
                        {{--</div>--}}
                    </div>
                </div>
                <div class="col-lg-9 col-xlg-10 col-md-8">
                    <div class="card">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs profile-tab" role="tablist">
                            {{--<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Timeline</a> </li>--}}
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile"
                                                    role="tab">{{ __('strings.Profile') }}</a></li>
                            {{--<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">{{ __('strings.Settings') }}</a> </li>--}}
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!--second tab-->
                            <div class="tab-pane active" id="profile" role="tabpanel">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"><strong>{{ __('strings.FullName') }}</strong>
                                            <br>
                                            <p class="text-muted">{{$userdata->first_name.' '.$userdata->last_name}}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong>{{ __('strings.Role') }}</strong>
                                            <br>
                                            <p class="text-muted">{{$userdata->user_type->name}}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong>{{ __('strings.Mobile') }}</strong>
                                            <br>
                                            <p class="text-muted">{{$userdata->telephone}}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong>{{ __('strings.Email') }}</strong>
                                            <br>
                                            <p class="text-muted">{{$userdata->email}}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6"><strong>{{ __('strings.School') }}</strong>
                                            <br>
                                            @if($userdata->school != null)
                                                <p class="text-muted">{{$userdata->school->school_name}}</p>
                                            @else
                                                <p class="text-muted">{{ __('strings.None') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-3 col-xs-6"><strong>{{ __('strings.City') }}</strong>
                                            <br>
                                            @if($userdata->city != null)
                                                <p class="text-muted">{{$userdata->city->city_name}}</p>
                                            @else
                                                <p class="text-muted">{{ __('strings.None') }}</p>
                                            @endif
                                        </div>

                                        @if($userdata->user_types_id == 3)
                                            @if($student_details)
                                                <div class="col-md-3 col-xs-6 b-r">
                                                    <strong>{{ __('strings.TeachingGrade') }}</strong>
                                                    <br>
                                                    @if($student_details->teaching_grade != null)
                                                        <p class="text-muted">{{$student_details->teaching_grade}}</p>
                                                    @else
                                                        <p class="text-muted">{{ __('strings.None') }}</p>
                                                    @endif
                                                </div>

                                                <div class="col-md-3 col-xs-6 b-r"><strong>{{ __('strings.YearsAsteacher') }}</strong>
                                                    <br>
                                                    @if($student_details->years_as_teacher != null)
                                                        <p class="text-muted">{{$student_details->years_as_teacher}}</p>
                                                    @else
                                                        <p class="text-muted">{{ __('strings.None') }}</p>
                                                    @endif
                                                </div>

                                                <div class="col-md-3 col-xs-6 b-r">
                                                    <strong>{{ __('strings.TechnicalSupport') }}</strong>
                                                    <br>
                                                    @if($student_details->technical_support != null)
                                                        <p class="text-muted">{{$student_details->technical_support}}</p>
                                                    @else
                                                        <p class="text-muted">{{ __('strings.None') }}</p>
                                                    @endif
                                                </div>

                                                <div class="col-md-3 col-xs-6"><strong>{{ __('strings.StudenttoStudentFeedback') }}</strong>
                                                    <br>
                                                    @if($student_details->student_to_student_feedback != null)
                                                        <p class="text-muted">{{$student_details->student_to_student_feedback}}</p>
                                                    @else
                                                        <p class="text-muted">{{ __('strings.None') }}</p>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="col-md-3 col-xs-6 b-r"><strong>{{ __('strings.TeachingGrade') }}</strong>
                                                    <br>
                                                    <p class="text-muted">{{ __('strings.None') }}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6 b-r"><strong>{{ __('strings.YearsAsteacher') }}</strong>
                                                    <br>
                                                    <p class="text-muted">{{ __('strings.None') }}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6 b-r"><strong>{{ __('strings.TechnicalSupport') }}</strong>
                                                    <br>
                                                    <p class="text-muted">{{ __('strings.None') }}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6"><strong>{{ __('strings.StudenttoStudentFeedback') }}</strong>
                                                    <br>
                                                    <p class="text-muted">{{ __('strings.None') }}</p>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- Row -->
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <div class="right-sidebar">
                <div class="slimscrollright">
                    <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span>
                    </div>
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
                            <li><a href="javascript:void(0)" data-theme="default-dark"
                                   class="default-dark-theme">7</a>
                            </li>
                            <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a>
                            </li>
                            <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                            <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a>
                            </li>
                            <li><a href="javascript:void(0)" data-theme="purple-dark"
                                   class="purple-dark-theme">11</a>
                            </li>
                            <li><a href="javascript:void(0)" data-theme="megna-dark"
                                   class="megna-dark-theme ">12</a>
                            </li>
                        </ul>
                        <ul class="m-t-20 chatonline">
                            <li><b>Chat option</b></li>
                            <li>
                                <a href="javascript:void(0)"><img
                                            src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/1.jpg"
                                            alt="user-img" class="img-circle"> <span>Varun Dhavan <small
                                                class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img
                                            src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/2.jpg"
                                            alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small
                                                class="text-warning">Away</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img
                                            src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/3.jpg"
                                            alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small
                                                class="text-danger">Busy</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img
                                            src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/4.jpg"
                                            alt="user-img" class="img-circle"> <span>Arijit Sinh <small
                                                class="text-muted">Offline</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img
                                            src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/5.jpg"
                                            alt="user-img" class="img-circle"> <span>Govinda Star <small
                                                class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img
                                            src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/6.jpg"
                                            alt="user-img" class="img-circle"> <span>John Abraham<small
                                                class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img
                                            src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/7.jpg"
                                            alt="user-img" class="img-circle"> <span>Hritik Roshan<small
                                                class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img
                                            src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/8.jpg"
                                            alt="user-img" class="img-circle"> <span>Pwandeep rajan <small
                                                class="text-success">online</small></span></a>
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
        <footer class="footer">
            © 2019 STL App by ORU
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
@endsection