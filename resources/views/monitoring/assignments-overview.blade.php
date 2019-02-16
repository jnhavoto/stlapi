@extends('layouts.layout')
@section('content')
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
                    <h3 class="text-themecolor m-b-0 m-t-0">{{ __('strings.AssignmentsOverview') }}</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">
                                {{ __('strings.Home') }}
                                Home</a></li>
                        <li class="breadcrumb-item active">
                            {{ __('strings.Monitoring') }}
                        </li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Start Assignment List -->
            <!-- ============================================================== -->
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">{{ __('strings.AssignmentSubmissions') }}</h4>
                </div>
                <div class="card-body">
                    <h4 class="card-title"> </h4>
                    <h6 class="card-subtitle">List of assignment submissions per student</h6>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table m-t-30 table-hover no-wrap contact-list">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Assignment Name</th>
                                <th>Participant Name</th>
                                <th>Submission Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($submissions as $submission)
                                @php
                                    $assign = \App\Models\AssignmentDescription::where('id',$submission['assignment_descriptions_id'])->first();
                                    $student = \App\Models\Student::where('id',$submission['students_id'])->first();
                                    $studentDetails = \App\User::where('id',$student['users_id'])->first();
                                @endphp
                                <tr>
{{--                                    <td>Number of items {{$submissions->count() }}</td>--}}
                                    <td>{{ $assign['number'] }}</td>
                                    <td>{{ $assign['case'] }}</td>
                                    <td>{{ $studentDetails['first_name'].' '.$studentDetails['last_name']}}</td>
                                    <td>{{ $submission['submission_date'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
                                            <input type="text" id="demo-input-search2" placeholder="search assignments"
                                                   class="form-control"></div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list
                                    table-striped color-table muted-table"
                                           data-page-size="10">
                                        <thead>
                                        <tr>
                                            <th> {{ __('strings.Number') }}
                                                {{--Number--}}
                                            </th>
                                            <th>{{ __('strings.AssignmentName') }}
                                                {{--Assignment name--}}
                                            </th>
                                            <th>{{ __('strings.CourseName') }}
                                                {{--Course name--}}
                                            </th>
                                            <th>{{ __('strings.Progress') }}
                                                {{--Instructions--}}
                                            </th>
                                            <th>{{ __('strings.StartDate') }}
                                                {{--Date of Start--}}
                                            </th>
                                            <th>{{ __('strings.EndDate') }}
                                                {{--Due Date--}}
                                            </th>
                                            <th>{{ __('strings.AvailableFrom') }}
                                                {{--Available from--}}
                                            </th>
                                            {{--<th>Joining date</th>--}}
                                            {{--<th>Salery</th>--}}
                                            <th>{{ __('strings.Status') }}
                                                {{--Status--}}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($teacher_assignments as $t_assignment)
                                            <tr>
                                                {{--<td>{{$student->id}}</td>--}}
                                                <td> {{ $t_assignment->number}}</td>
                                                {{--<td> {{ $t_assignment->name}}</td>--}}
                                                <td>
                                                    {{--<a href="/assignment_details">--}}
                                                    <a href="/" data-toggle="modal" data-target="#modalAssCourseDetails"
                                                       onclick="assignCourseDetails({{$t_assignment}})">
                                                        {{$t_assignment->case}}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{--list details of a course--}}
                                                    <a href="/" data-toggle="modal" data-target="#modalCourseDetails"
                                                       onclick="courseDetails({{$t_assignment}})">
                                                        {{$t_assignment->course->name}}
                                                    </a>
                                                </td>
                                                {{--courseDetails($t_assignment->courses)--}}
                                                <td>Show a BAR</td>
                                                <td>{{$t_assignment->startdate}}</td>
                                                <td>{{$t_assignment->deadline}}</td>
                                                <td>{{$t_assignment->available_date}}</td>
                                                <td>
                                                    @if($t_assignment->status == 0)
                                                        {{ __('strings.Active') }}
                                                        {{--Active--}}
                                                    @else
                                                        {{ __('strings.Disactive') }}
                                                        {{--Disactive--}}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
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
            <!-- Start General Overview -->
            <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap">
                                            <div>
                                                <h3 class="card-title">  {{ __('strings.AssignmentsOverview') }}</h3>
                                                <h6 class="card-subtitle">Finished vs Ongoing</h6> </div>
                                            <div class="ml-auto">
                                                <ul class="list-inline">
                                                    <li>
                                                        <h6 class="text-muted text-success"><i class="fa fa-circle
                                                    font-10 m-r-10 "></i>Finished</h6> </li>
                                                    <li>
                                                        <h6 class="text-muted  text-info"><i class="fa fa-circle font-10
                                                    m-r-10"></i>Ongoing</h6> </li>
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
                                <h3 class="card-title">{{ __('strings.Courses') }}
                                    {{--All Assignments --}}
                                </h3>
                                <h6 class="card-subtitle">Different stages</h6>
                                <div id="visitor" style="height:290px; width:100%;"></div>
                            </div>
                            <div>
                                <hr class="m-t-0 m-b-0">
                            </div>
                            <div class="card-body text-center ">
                                <ul class="list-inline m-b-0">
                                    <li>
                                        <h6 class="text-muted text-info"><i class="fa fa-circle font-10 m-r-10 "></i>Finihsed</h6>
                                    </li>
                                    <li>
                                        <h6 class="text-muted  text-primary"><i class="fa fa-circle font-10
                                        m-r-10"></i>
                                            {{ __('strings.Ongoing') }}
                                            {{--Ongoing--}}
                                        </h6>
                                    </li>
                                    <li>
                                        <h6 class="text-muted  text-primary"><i class="fa fa-circle font-10
                                        m-r-10"></i>
                                            {{ __('strings.Late') }}
                                        </h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End General Overview -->
            <!-- ============================================================== -->
        </div>
    </div>

    <div id="testetetetet">

    </div>

    @include('design.modals.submission-details')


    <script>
        function submissionDetails(submission) {
            var  submission = submission;
            $("#area").html(submission.area);
            $("#grade").html(submission.grade);
            $("#numberofstudents").html(submission.number_of_students);
            $("#startdateoflecture").html(submission.start_date_of_lecture);
            $("#enddateoflecture").html(submission.end_date_of_lecture);
            $("#porpose").html(submission.purpose);
            console.log(submission);
        }
    </script>
@endsection
