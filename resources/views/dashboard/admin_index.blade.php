@extends('layouts.layout_admin')

@section('content')

    {{--<style>--}}
        {{--/* unvisited link */--}}
        {{--a:link {--}}
            {{--color: blue;--}}
        {{--}--}}

        {{--/* visited link */--}}
        {{--a:visited {--}}
            {{--color: purple;--}}
        {{--}--}}

        {{--/* mouse over link */--}}
        {{--a:hover {--}}
            {{--color: hotpink;--}}
        {{--}--}}

        {{--/* selected link */--}}
        {{--a:active {--}}
            {{--color: blue;--}}
        {{--}--}}
    {{--</style>--}}

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
                            <li class="breadcrumb-item active">{{ __('strings.Dashboard') }}</li>
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
                                                    {{ __('strings.Users') }}
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
                                                <th> # </th>
                                                <th>{{ __('strings.Name') }} </th>
                                                <th>{{ __('strings.Email') }} </th>
                                                <th>{{ __('strings.Phone') }} </th>
                                                <th>{{ __('strings.Role') }} </th>
                                                <th>{{ __('strings.LastLogin') }} </th>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    {{--<td>{{$student->id}}</td>--}}
                                                    <td>  {{ $loop->index + 1 }}</td>
                                                    <td>
                                                        @if($user->user_types_id == 1 || $user->user_types_id == 2 )
                                                            <a href="/user-details/{{$user->id}}">
                                                                {{--<img src="{{asset ("theme/images/users/1.jpg")}} " alt="user" class="img-circle" />--}}
                                                                {{$user->first_name.' '.$user->last_name}}
                                                            </a>
                                                        @else
                                                            <a href="/admin-student-details/{{$user->id}}">
                                                                {{--<img src="{{asset ("theme/images/users/1.jpg")}} " alt="user" class="img-circle" />--}}
                                                                {{$user->first_name.' '.$user->last_name}}
                                                            </a>
                                                        @endif
                                                            {{--@if($user == 1)--}}
                                                                {{--<a href="/user-details/{{$user->id}}">--}}
                                                                    {{--<img src="{{asset ("theme/images/users/1.jpg")}} " alt="user" class="img-circle" />--}}
                                                                    {{--{{$user->first_name.' '.$user->last_name}}--}}
                                                                {{--</a>--}}
                                                            {{--@endif--}}

                                                        {{--<a href="/user-details/{{$user->id}}">--}}
                                                            {{--<img src="{{asset ("theme/images/users/1.jpg")}} " alt="user" class="img-circle" />--}}
                                                            {{--{{$user->first_name.' '.$user->last_name}}--}}
                                                        {{--</a>--}}
                                                    </td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->telephone}}</td>
                                                    <td>{{$user->user_type->name}} </td>
                                                    <td>
                                                        @if(empty($user->last_login))
                                                            -
                                                            @else
                                                            {{$user->last_login}}
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endforeach
                                            <div class="panel-heading" style="display:flex; justify-content:center;align-items:center;">
                                                {{$users->links()}}
                                            </div>
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

                {{--<!-- ============================================================== -->--}}
                {{--<!-- Start Assignment List Content -->--}}
                {{--<!-- ============================================================== -->--}}
                {{--<div class="row">--}}
                    {{--<div class="col-12">--}}
                        {{--<div class="card">--}}
                            {{--<!-- .left-right-aside-column-->--}}
                            {{--<div class="contact-page-aside">--}}
                                {{--<div class="pl-4">--}}
                                    {{--<div class="right-page-header">--}}
                                        {{--<div class="d-flex">--}}
                                            {{--<div class="align-self-center">--}}
                                                {{--<h4 class="card-title m-t-10">--}}
                                                    {{--{{ __('strings.Logs') }}--}}
                                                    {{--My Assignment List--}}
                                                {{--</h4></div>--}}
                                            {{--<div class="ml-auto">--}}
                                                {{--<input type="text" id="demo-input-search2"--}}
                                                       {{--placeholder="{{ __('strings.SearchUser') }}"--}}
                                                       {{--class="form-control">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="table-responsive">--}}
                                        {{--<table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list--}}
                                    {{--table-striped color-table muted-table"--}}
                                               {{--data-page-size="10">--}}
                                            {{--<thead>--}}
                                            {{--<tr>--}}
                                                {{--<th> # </th>--}}
                                                {{--<th>{{ __('strings.Name') }} </th>--}}
                                                {{--<th>{{ __('strings.LastLogin') }} </th>--}}
                                                {{--<th># {{ __('strings.Feedbacks') }} </th>--}}
                                                {{--<th># {{ __('strings.Ratings') }} </th>--}}
                                            {{--</tr>--}}
                                            {{--</thead>--}}
                                            {{--<tbody>--}}
                                                {{--@foreach ($lastlogin_users as $loginuser)--}}
                                                    {{--<tr>--}}
                                                        {{--<td>  {{ $loop->index + 1 }}</td>--}}
                                                        {{--<td>--}}
                                                            {{--<a href="/user-details/{{$loginuser->id}}">--}}
                                                                {{--<img src="{{asset ("theme/images/users/1.jpg")}} " alt="user" class="img-circle" />--}}
                                                                {{--{{$loginuser->first_name.' '.$loginuser->last_name}}--}}
                                                            {{--</a>--}}
                                                        {{--</td>--}}
                                                        {{--<td>  {{$loginuser->last_login}}</td>--}}

                                                    {{--</tr>--}}
                                                {{--@endforeach--}}
                                            {{--</tbody>--}}
                                            {{--<tfoot>--}}
                                            {{--<tr>--}}
                                                {{--<td colspan="7">--}}
                                                    {{--<div class="text-right">--}}
                                                        {{--<ul class="pagination"></ul>--}}
                                                    {{--</div>--}}
                                                {{--</td>--}}
                                            {{--</tr>--}}
                                            {{--</tfoot>--}}
                                        {{--</table>--}}
                                    {{--</div>--}}
                                    {{--<!-- .left-aside-column-->--}}
                                {{--</div>--}}
                                {{--<!-- /.left-right-aside-column-->--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

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

