@extends('layouts.layout')

@section('content')
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
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
                        <h3 class="text-themecolor">   {{ __('strings.general_overview') }} </h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">{{ __('strings.Home') }} </a></li>
                            <li class="breadcrumb-item active">{{ __('strings.general_overview') }}</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Course List Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- .left-right-aside-column-->
                            <div class="contact-page-aside">
                                <div class="pl-4">
                                    <div class="right-page-header">
                                        <div class="d-flex">
                                            <div class="align-self-center">
                                                <h4 class="card-title m-t-10">
                                                    {{ __('strings.MyCList') }}
                                                    {{--My Assignment List--}}
                                                </h4></div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list
                                    table-striped color-table info-table"
                                               data-page-size="10">
                                            <thead>
                                            <tr>
                                                <th>{{ __('strings.CourseName') }} </th>
                                                <th> # {{ __('strings.Assignments') }} </th>
                                                <th>{{ __('strings.StartDate') }} </th>
                                                <th>{{ __('strings.AvailableFrom') }} </th>
                                                <th>{{ __('strings.Status') }}
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($teacherCourses)!=0)
                                                @foreach ($teacherCourses as $course)
                                                    <tr>
                                                        <td>
                                                            <a href="/" data-toggle="modal"
                                                               data-target="#modalAssCourseDetails">
                                                                {{ $course->course->name }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            @php
                                                                $countAssignments =
                                                                \App\Models\AssignmentDescriptionsHasCourse::where
                                                                ('courses_id',$course->courses_id)->get();
                                                            @endphp
                                                            {{ count($countAssignments)}}
                                                        </td>
                                                        <td> {{ $course->course->startdate}}</td>
                                                        <td> {{ $course->course->available_date}}</td>
                                                        <td>
                                                            @if($course->course->status == 0)
                                                                {{ __('strings.Active') }}
                                                            @else
                                                                {{ __('strings.Disactive') }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- .left-aside-column-->
                                </div>
                                <!-- /.left-right-aside-column-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Course List Content -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Start Assignment List Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- .left-right-aside-column-->
                            <div class="contact-page-aside">
                                <div class="pl-4">
                                    <div class="right-page-header">
                                        <div class="d-flex">
                                            <div class="align-self-center">
                                                <h4 class="card-title m-t-10">
                                                    {{ __('strings.MyAssignmentList') }}
                                                    {{--My Assignment List--}}
                                                </h4></div>
                                            <div class="ml-auto">
                                                <input type="text" id="demo-input-search2"
                                                       placeholder="{{ __('strings.SearchAssignments') }}"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list
                                    table-striped color-table muted-table"
                                               data-page-size="10">
                                            <thead>
                                            <tr>
                                                <th>{{ __('strings.AssignmentName') }} </th>
                                                <th>{{ __('strings.CourseName') }} </th>
                                                <th># {{ __('strings.Submissions') }} </th>
                                                <th># {{ __('strings.Feedbacks') }} </th>
                                                <th># {{ __('strings.Ratings') }} </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            {{--{{$assignmentsTeacher->count()}}--}}
                                            @foreach ($assignTeacher as $assign)
                                                <tr>
                                                    <td>
                                                        <a href="/assignmentdesign-overview/{{$assign->id}}">
                                                            {{$assign->case}}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        {{--@php--}}
                                                            {{--$course = \App\Models\Course::where('id',--}}
                                                            {{--$assign->courses_id)->first();--}}
                                                        {{--@endphp--}}
                                                        <a href={{ url('/coursedesign-overview/'.$assign->courses_id)}}>
                                                            {{$assign->course->name}}
                                                        </a>
                                                    </td>

                                                    {{--<td>--}}
                                                        {{--@php--}}
                                                            {{--$announcements=--}}
                                                            {{--\App\Models\AssignmentAnnouncement::where--}}
                                                            {{--('assignment_descriptions_id',$assign->id)->get();--}}
                                                        {{--@endphp--}}
                                                        {{--{{ count($announcements)}}--}}
                                                    {{--</td>--}}
                                                    <td>
                                                        @php
                                                            $submissions=
                                                            \App\Models\AssignmentSubmission::where
                                                            ('assignment_descriptions_id',$assign->id)->get();
                                                        @endphp
                                                        {{ count($submissions)}}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $totalfeedbacks=0;
                                                            foreach ($submissions as $submission)
                                                            {
                                                                $feedbacks=
                                                            \App\Models\Feedback::where
                                                            ('assignment_submissions_id',
                                                            $submission->id)->get();
                                                                $totalfeedbacks = count($feedbacks)+$totalfeedbacks;
                                                            }


                                                        @endphp
                                                        {{ $totalfeedbacks}}
                                                    </td>
                                                    <td>
                                                        Numbers!
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="text-right">
                                                        <ul class="pagination"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- .left-aside-column-->
                                </div>
                                <!-- /.left-right-aside-column-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Assignment List Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-12">
                        <div class="card">
                            <!-- .left-right-aside-column-->
                            <div class="contact-page-aside">
                                <div class="pl-4">
                                    <div class="right-page-header">
                                        <div class="d-flex">
                                            <div class="align-self-center">
                                                <h4 class="card-title m-t-10">
                                                    {{ __('strings.Notifications') }}
                                                    {{--My Assignment List--}}
                                                </h4>
                                            </div>
                                            <div class="ml-auto">
                                                <input type="text" id="demo-input-search2"
                                                       placeholder="{{ __('strings.SearchAssignments') }}"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list
                                    table-striped color-table muted-table"
                                               data-page-size="10">
                                            <thead>
                                            <tr>
                                                <th>{{ __('strings.CourseName') }} </th>
                                                <th>{{ __('strings.TotalAnnouncements') }} </th>
                                                <th>{{ __('strings.NewAnnouncements') }} </th>
                                                <th>{{ __('strings.TotalChats') }} </th>
                                                <th>{{ __('strings.NewChats') }} </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($teacherCourses)!=0)
                                                @foreach ($teacherCourses as $course)
                                                    <tr>
                                                        <td>
                                                            <a href="/" data-toggle="modal"
                                                               data-target="#modalAssCourseDetails">
                                                                {{ $course->course->name }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            @php
                                                                $courseAnnounc=
                                                                \App\Models\AssignmentAnnouncement::where
                                                                ('assignment_descriptions_id',$assign->id)->get();
                                                            @endphp
                                                            {{$courseAnnounc->count()}}
                                                        </td>
                                                        <td>
                                                            @php
                                                                $courseNewAnnounc=
                                                                \App\Models\CourseAnnouncement::where
                                                                ('courses_id',$course->id)->get();
                                                            @endphp
                                                            {{$courseNewAnnounc->count()}}
                                                        </td>
                                                        <td>
                                                            @php
                                                                $courseChats=
                                                                \App\Models\UsersChat::where
                                                                ('courses_id',$course->id)->get();
                                                            @endphp
                                                            {{$courseChats->count()}}
                                                        </td>
                                                        <td>
                                                            @php
                                                                $courseNewChats=
                                                                \App\Models\UsersChat::where
                                                                ('courses_id',$course->id)->get();
                                                            @endphp
                                                            {{$courseNewChats->count()}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="text-right">
                                                        <ul class="pagination"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- .left-aside-column-->
                                    <div class="table-responsive">
                                        <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list
                                    table-striped color-table muted-table"
                                               data-page-size="10">
                                            <thead>
                                            <tr>
                                                <th>{{ __('strings.AssignmentName') }} </th>
                                                <th>{{ __('strings.TotalAnnouncements') }} </th>
                                                <th>{{ __('strings.NewAnnouncements') }} </th>
                                                <th>{{ __('strings.TotalChats') }} </th>
                                                <th>{{ __('strings.NewChats') }} </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            {{--{{$assignmentsTeacher->count()}}--}}
                                            @foreach ($assignTeacher as $assign)
                                                <tr>
                                                    <td>
                                                        <a href="/assignmentdesign-overview/{{$assign->id}}">
                                                            {{$assign->case}}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        @php
                                                            $assignAnnounc =
                                                            \App\Models\AssignmentAnnouncement::where
                                                            ('assignment_descriptions_id',$assign->id)->get();
                                                        @endphp
                                                        {{ count($assignAnnounc)}}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $assignNewAnnounc =
                                                            \App\Models\AssignmentAnnouncement::where
                                                            ('assignment_descriptions_id',$assign->id)->get();
                                                        @endphp
                                                        {{ count($assignNewAnnounc)}}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $assignChats=
                                                            \App\Models\UsersChat::where
                                                            ('assignment_description_id',$assign->id)->get();
                                                        @endphp
                                                        {{$assignChats->count()}}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $assignNewChats=
                                                            \App\Models\UsersChat::where
                                                            ('assignment_description_id',$assign->id)->get();
                                                        @endphp
                                                        {{$assignNewChats->count()}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="text-right">
                                                        <ul class="pagination"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- .left-aside-column-->
                                </div>
                                <!-- /.left-right-aside-column-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <!-- Column -->
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('theme/images/background/profile-bg.jpg') }}"
                                 alt="Card image cap">
                            <div class="card-body little-profile text-center">
                                <div class="pro-img"><img src="{{ asset('theme/images/users/4.jpg') }}" alt="user"/>
                                </div>
                                <h3 class="m-b-0">{{$user->first_name.' '.$user->last_name}}</h3>
                                <p>Instructor</p>
                                {{--<a href="javascript:void(0)" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded">Follow</a>--}}
                                <div class="row text-center m-t-20">
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h3 class="m-b-0 font-light">{{$teacherCourses->count()}}</h3>
                                        <small>Courses</small>
                                    </div>
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h3 class="m-b-0 font-light">{{$countAssign}}</h3>
                                        <small>Assignments</small>
                                    </div>
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h3 class="m-b-0 font-light">
                                            {{$assignChats->count()+$courseChats->count()+$courseAnnounc->count()+
                                            $assignAnnounc->count()}}</h3>
                                        <small>Communications</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home"
                                                        role="tab">Activity</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a>
                                </li>
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
                                                <div class="sl-left"><img src="{{ asset('theme/images/users/3.jpg') }}"
                                                                          alt="user" class="img-circle"></div>
                                                <div class="sl-right">
                                                    <div><a href="#" class="link">Annika Anderson</a> <span
                                                                class="sl-date">5 minutes ago</span>
                                                        <p class="m-t-10"> I am late submitting my feedback. Sorry! </p>
                                                    </div>
                                                    <div class="like-comm m-t-20"><a href="javascript:void(0)"
                                                                                     class="link m-r-10">2 comment</a>
                                                        <a href="javascript:void(0)" class="link m-r-10"><i
                                                                    class="fa fa-heart text-danger"></i> 5 Love</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="sl-item">
                                                <div class="sl-left"><img src="{{ asset('theme/images/users/4.jpg') }}"
                                                                          alt="user" class="img-circle"></div>
                                                <div class="sl-right">
                                                    <div><a href="#"
                                                            class="link">{{$user->first_name.' '.$user->last_name}}</a>
                                                        <span
                                                                class="sl-date">5
                                                            minutes ago</span>
                                                        <blockquote class="m-t-10">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                            sed do eiusmod tempor incididunt
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
                                            <div class="col-md-3 col-xs-6 b-r"><strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted">{{$user->first_name.' '.$user->last_name}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"><strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted">{{$user->telephone}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"><strong>Email</strong>
                                                <br>
                                                <p class="text-muted">{{$user->email}}</p>
                                            </div>
                                            {{--<div class="col-md-3 col-xs-6"> <strong>Location</strong>--}}
                                            {{--<br>--}}
                                            {{--<p class="text-muted">{{$user->first_name.' '.$user->last_name}}</p>--}}
                                            {{--</div>--}}
                                        </div>
                                        <hr>
                                        <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget,
                                            arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam
                                            dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus
                                            elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula,
                                            porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. It has survived not only five centuries </p>
                                        <p>It was popularised in the 1960s with the release of Letraset sheets
                                            containing Lorem Ipsum passages, and more recently with desktop publishing
                                            software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        <h4 class="font-medium m-t-30">Skill Set</h4>
                                        <hr>
                                        <h5 class="m-t-30">Teaching <span class="pull-right">80%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80"
                                                 aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;">
                                                <span class="sr-only">50% Complete</span></div>
                                        </div>
                                        <h5 class="m-t-30">Research <span class="pull-right">90%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90"
                                                 aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;">
                                                <span class="sr-only">50% Complete</span></div>
                                        </div>
                                        <h5 class="m-t-30">Other skills <span class="pull-right">50%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50"
                                                 aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;">
                                                <span class="sr-only">50% Complete</span></div>
                                        </div>
                                        <h5 class="m-t-30">Programming <span class="pull-right">70%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70"
                                                 aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;">
                                                <span class="sr-only">50% Complete</span></div>
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
                                                           class="form-control form-control-line" name="example-email"
                                                           id="example-email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" value="password"
                                                           class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="123 456 7890"
                                                           class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Message</label>
                                                <div class="col-md-12">
                                                    <textarea rows="5"
                                                              class="form-control form-control-line"></textarea>
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
                                       class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a>
                                </li>
                                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a>
                                </li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark"
                                       class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark"
                                       class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('theme/images/users/1.jpg') }}"
                                                                      alt="user-img" class="img-circle"> <span>Varun Dhavan <small
                                                    class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('theme/images/users/2.jpg') }}"
                                                                      alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small
                                                    class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('theme/images/users/3.jpg') }}"
                                                                      alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small
                                                    class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('theme/images/users/4.jpg') }}"
                                                                      alt="user-img" class="img-circle"> <span>Arijit Sinh <small
                                                    class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('theme/images/users/5.jpg') }}"
                                                                      alt="user-img" class="img-circle"> <span>Govinda Star <small
                                                    class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('theme/images/users/6.jpg') }}"
                                                                      alt="user-img" class="img-circle"> <span>John Abraham<small
                                                    class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('theme/images/users/7.jpg') }}"
                                                                      alt="user-img" class="img-circle"> <span>Hritik Roshan<small
                                                    class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('theme/images/users/8.jpg') }}"
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




    <script>


    </script>
@endsection

