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
                    <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card"> <img class="card-img" src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/background/socialbg.jpg" alt="Card image">
                        <div class="card-img-overlay card-inverse social-profile d-flex ">
                            <div class="align-self-center"> <img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/1.jpg" class="img-circle" width="100">
                                <h4 class="card-title">{{$user->first_name.' '.$user->last_name}}</h4>
                                <h6 class="card-subtitle">{{$user->email}}</h6>
                                {{--<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>--}}
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body"> <small class="text-muted">Email address </small>
                            <h6>{{$user->email}}</h6> <small class="text-muted p-t-30 db">Phone</small>
                            <h6>{{$user->telephone}}</h6> <small class="text-muted p-t-30 db">Address</small>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs profile-tab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home"
                                                     role="tab">Courses</a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                            {{--<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>--}}
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="contact-page-aside">
                                    <div class="pl-4">
                                        <div class="right-page-header">
                                            <div class="d-flex">
                                                <div class="align-self-center">
                                                    <h4 class="card-title m-t-10">
                                                        {{ __('strings.MyCList') }}
                                                        {{--My Course List --}}
                                                    </h4></div>
                                                <div class="ml-auto">
                                                    <input type="text" id="demo-input-search2" placeholder="search courses"
                                                           class="form-control"> </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list
                                    table-striped color-table muted-table" data-page-size="10">
                                                <thead>
                                                <tr>
                                                    <th> {{ __('strings.No') }}
                                                        {{--No--}}
                                                    </th>
                                                    <th>{{ __('strings.CourseName') }}
                                                        {{--Full Name--}}
                                                    </th>
                                                    <th>{{ __('strings.CourseDescription') }}
                                                        {{--Content--}}
                                                    </th>
                                                    <th>{{ __('strings.Members') }}
                                                        {{--Content--}}
                                                    </th>
                                                    <th>{{ __('strings.StartDate') }}
                                                        {{--Date of Start--}}
                                                    </th>
                                                    <th>{{ __('strings.AvailableFrom') }}
                                                        {{--Date of Start--}}
                                                    </th>
                                                    <th>{{ __('strings.Status') }}
                                                        {{--Status--}}
                                                    </th>
                                                    <th>{{ __('strings.Action') }}
                                                        {{--Status--}}
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                {{--@foreach ($teacherCourses as $course)--}}
                                                {{--<tr>--}}
                                                {{--<td>{{$student->id}}</td>--}}
                                                {{--<td> {{ $loop->index + 1 }}</td>--}}
                                                {{--<td>--}}
                                                {{--<a href="/coursedesign-overview/{{$course->id}}" >--}}
                                                {{--{{$course->name}}--}}
                                                {{--</a>--}}
                                                {{--</td>--}}
                                                {{--<td>{{substr($course->course_content, 0, 45) }}</td>--}}
                                                {{--<td>--}}
                                                {{--@php--}}
                                                {{--$courseMembers = \App\Models\Course::find($course->id)->teachers;--}}
                                                {{--@endphp--}}
                                                {{--@foreach($courseMembers as $members)--}}
                                                {{--<a href="/contact-details-other/{{$members->user->id}}">{{--}}
                                                {{--$members->user->first_name .' '.$members->user->last_name--}}
                                                {{--}}</a>--}}
                                                {{--<br/>--}}
                                                {{--@endforeach--}}
                                                {{--</td>--}}
                                                {{--<td>{{$course->startdate}}</td>--}}
                                                {{--<td>{{$course->available_date}}</td>--}}
                                                {{--<td>--}}
                                                {{--@if($course->status == 0) {{ __('strings.Active') }}--}}
                                                {{--Active--}}
                                                {{--@else--}}
                                                {{--{{ __('strings.Disactive') }}--}}
                                                {{--Disactive--}}
                                                {{--@endif--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                {{--@php--}}
                                                {{--$currentdate = Carbon\Carbon::now();--}}
                                                {{--@endphp--}}
                                                {{--@if($course->available_date > $currentdate)--}}
                                                {{--<a href="/" data-toggle="modal" data-target="#update-course"--}}
                                                {{--onclick="updateCourseDetails({{$course}})">--}}
                                                {{--Edit--}}
                                                {{--</a>--}}
                                                {{--@else--}}
                                                {{--Edit--}}
                                                {{--@endif--}}
                                                {{--</td>--}}
                                                {{--</tr>--}}
                                                {{--@endforeach--}}
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td colspan="2">
                                                        <button type="button" onclick="courseCleanDetails()" class="btn
                                                btn-info btn-rounded"
                                                                data-toggle="modal" data-target="#create-course">
                                                            {{ __('strings.AddNewCourse') }}
                                                            {{--Add New Course--}}
                                                        </button>
                                                    </td>
                                                    {{--<td colspan="7">--}}
                                                    {{--<div class="text-right">--}}
                                                    {{--<ul class="pagination"> </ul>--}}
                                                    {{--</div>--}}
                                                    {{--</td>--}}
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- .left-aside-column-->

                                        {{--<div class="sl-item">--}}
                                        {{--<div class="sl-left"> <img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/1.jpg" alt="user" class="img-circle" /> </div>--}}
                                        {{--<div class="sl-right">--}}
                                        {{--<div><a href="#" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>--}}
                                        {{--<p>assign a new task <a href="#"> Design weblayout</a></p>--}}
                                        {{--<div class="row">--}}
                                        {{--<div class="col-lg-3 col-md-6 m-b-20"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/big/img1.jpg" class="img-responsive radius" /></div>--}}
                                        {{--<div class="col-lg-3 col-md-6 m-b-20"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/big/img2.jpg" class="img-responsive radius" /></div>--}}
                                        {{--<div class="col-lg-3 col-md-6 m-b-20"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/big/img3.jpg" class="img-responsive radius" /></div>--}}
                                        {{--<div class="col-lg-3 col-md-6 m-b-20"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/big/img4.jpg" class="img-responsive radius" /></div>--}}
                                        {{--</div>--}}
                                        {{--<div class="like-comm"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<hr>--}}
                                        {{--<div class="sl-item">--}}
                                        {{--<div class="sl-left"> <img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/2.jpg" alt="user" class="img-circle" /> </div>--}}
                                        {{--<div class="sl-right">--}}
                                        {{--<div> <a href="#" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>--}}
                                        {{--<div class="m-t-20 row">--}}
                                        {{--<div class="col-md-3 col-xs-12"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/big/img1.jpg" alt="user" class="img-responsive radius" /></div>--}}
                                        {{--<div class="col-md-9 col-xs-12">--}}
                                        {{--<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. </p> <a href="#" class="btn btn-success"> Design weblayout</a></div>--}}
                                        {{--</div>--}}
                                        {{--<div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<hr>--}}
                                        {{--<div class="sl-item">--}}
                                        {{--<div class="sl-left"> <img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/3.jpg" alt="user" class="img-circle" /> </div>--}}
                                        {{--<div class="sl-right">--}}
                                        {{--<div><a href="#" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>--}}
                                        {{--<p class="m-t-10"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>--}}
                                        {{--</div>--}}
                                        {{--<div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<hr>--}}
                                        {{--<div class="sl-item">--}}
                                        {{--<div class="sl-left"> <img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/4.jpg" alt="user" class="img-circle" /> </div>--}}
                                        {{--<div class="sl-right">--}}
                                        {{--<div><a href="#" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>--}}
                                        {{--<blockquote class="m-t-10">--}}
                                        {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt--}}
                                        {{--</blockquote>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
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
                                            <p class="text-muted"> {{$user->telephone}} </p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                            <br>
                                            <p class="text-muted">{{$user->email}}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                            <br>
                                            <p class="text-muted">London</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                                    <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                    <h4 class="font-medium m-t-30">Skill Set</h4>
                                    <hr>
                                    <h5 class="m-t-30">Wordpress <span class="pull-right">80%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                    <h5 class="m-t-30">HTML 5 <span class="pull-right">90%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                    <h5 class="m-t-30">jQuery <span class="pull-right">50%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                    <h5 class="m-t-30">Photoshop <span class="pull-right">70%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
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
                                <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
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
            © 2018 Material Pro Admin by wrappixel.com
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
@endsection