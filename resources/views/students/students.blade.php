@extends('layouts.layout')

@section('content')
    <div class="row clearfix">
        <!-- Task Info -->
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-lg-8">
            <div class="card">
                <div class="header">
                    <h2>STUDENTS INFO</h2>
                    {{--<ul class="header-dropdown m-r--5">--}}
                        {{--<li class="dropdown">--}}
                            {{--<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
                                {{--<i class="material-icons">more_vert</i>--}}
                            {{--</a>--}}
                            {{--<ul class="dropdown-menu pull-right">--}}
                                {{--<li><a href="javascript:void(0);">Action</a></li>--}}
                                {{--<li><a href="javascript:void(0);">Another action</a></li>--}}
                                {{--<li><a href="javascript:void(0);">Something else here</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover STL-TEACHER-task-infos">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Full name</th>
                                {{--Onclick, will take to Student's profile--}}
                                <th>Telephone</th>
                                <th>Email</th>
                                {{--<th>Recent activity</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $students as $student )
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->user->first_name.' '.$student->user->last_name }}</td>
                                <td> {{ $student->user->telephone }} </td>
                                <td>{{ $student->user->email }}</td>
                                {{--<td>--}}
                                    {{--<div class="progress">--}}
                                        {{--<div class="progress-bar bg-green" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>--}}
                                    {{--</div>--}}
                                {{--</td>--}}
                                <td>
                                    <ul class="header-dropdown m-r--5">
                                        <li class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="/studentprofile"><i
                                                                class="material-icons">person</i>User
                                                        Details</a></li>
                                                <li><a href="javascript:void(0);"><i class="material-icons">delete</i>
                                                        Remove User</a></li>
                                                <li><a href="javascript:void(0);"><i
                                                                class="material-icons">message</i>Send message</a></li>
                                                <li><a href="javascript:void(0);"><i
                                                                class="material-icons">delete</i>Remove from
                                                        Course</a></li>
                                                <li><a href="javascript:void(0);"><i
                                                                class="material-icons">delete</i>Remove from
                                                        Assignment</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Task Info -->
        <!-- Browser Usage -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="header">
                    <h2>BROWSER USAGE</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div id="donut_chart" class="STL-TEACHER-donut-chart"></div>
                </div>
            </div>
        </div>
        <!-- #END# Browser Usage -->
    </div>

@endsection