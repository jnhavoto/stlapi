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
                    <h3 class="text-themecolor m-b-0 m-t-0">
                        {{ __('strings.CourseOverview') }}
                        {{--Course Overview--}}
                    </h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">
                                {{ __('strings.Home') }}
                            </a></li>
                        <li class="breadcrumb-item active">
                            {{ __('strings.CourseDetails') }}
                        </li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start of Assignment List -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex flex-wrap">
                                        <div>
                                            <h3 class="card-title">{{ __('strings.CourseDetails') }}</h3>
                                            {{--<h6 class="card-subtitle">Ample Admin Vs Pixel Admin</h6>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="col-md-6 m-b-20">
                                        <h4>{{ __('strings.CourseName') }}</h4>
                                        <label> {{ $course->name }} </label>
                                    </div>
                                    <div>
                                        <hr class="m-t-0 m-b-0">
                                    </div>
                                    <div class="col-md-4 m-b-20">
                                        <h4 class="control-label">{{ __('strings.StartDate') }}</h4>
                                        <label> {{ $course->startdate }} </label>
                                    </div> <div>
                                        <hr class="m-t-0 m-b-0">
                                    </div>
                                    <div class="col-md-4 m-b-20">
                                        <h4 class="control-label">{{ __('strings.AvailableDate') }}</h4>
                                        <label> {{$course->available_date }}</label>
                                    </div>
                                    <div>
                                        <hr class="m-t-0 m-b-0">
                                    </div>
                                    <div class="col-md-6 m-b-20">
                                        <h4 class="control-label">{{ __('strings.Members') }} </h4>
                                        @foreach($courseMembers as $members)
                                            <label>
                                                {{$members->teacher->user->first_name .' '.$members->teacher->user->last_name }}
                                            </label>
                                            <br/>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> {{ __('strings.Instructions') }} </h4>
                            {{--<h6 class="card-subtitle">Different Devices Used to Visit</h6>--}}
                            <label> {{$course->course_content }}</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End of Assignment List -->
            <!-- ============================================================== -->
            <!-- Start Assignment Course List Content -->
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
                                                {{ __('strings.CourseAssignments') }}
                                                {{--Course Assignments--}}
                                            </h4></div>
                                        <div class="ml-auto">
                                            <input type="text" id="demo-input-search2" placeholder="{{ __('strings.SearchAssignments') }}"
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
                                            <th>#</th>
                                            <th> {{ __('strings.AssignmentName') }} </th>
                                            <th> {{ __('strings.Progress') }} </th>
                                            <th> # {{ __('strings.Submissions') }}</th>
                                            <th> # {{ __('strings.Feedbacks') }} </th>
                                            <th> # {{ __('strings.Ratings') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($courseAssignemts as $assignment)
                                            <tr>
                                                <td> {{ $assignment->number }}</td>
                                                <td>
                                                    <a href="/" data-toggle="modal"
                                                       data-target="#modalAssCourseDetails">
                                                        {{ $assignment->case }}
                                                    </a>

                                                </td>

                                                <td>
                                                    @php
                                                        $countStudents = \App\Models\Student::all()->count();
                                                        $countSubmissions=
                                                        \App\Models\AssignmentSubmission::where
                                                        ('assignment_descriptions_id',$assignment->id)->count();
                                                        $progress = $countSubmissions*100/$countStudents;
                                                    @endphp
                                                    <div class="progress progress-xs margin-vertical-10 ">
                                                        <div class="progress-bar bg-danger" style="width: {{$progress}}%;
                                                        height:12px;"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @php
                                                        $submissions=
                                                        \App\Models\AssignmentSubmission::where
                                                        ('assignment_descriptions_id',$assignment->id)->get();
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

                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>

                                            {{--Calling create modal--}}
                                            {{--@include('design.modals.create-assignment')--}}

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
        {{--<!-- ============================================================== -->--}}
        <!-- End of Assignment - Courst List -->
            <!-- ============================================================== -->

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
                                                {{--{{ __('strings.AssignmentProgress') }}--}}
                                                {{--Course Assignments--}}
                                            {{--</h4></div>--}}
                                        {{--<div class="ml-auto">--}}
                                            {{--<input type="text" id="demo-input-search2" placeholder="search assignments"--}}
                                                   {{--class="form-control"></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="table-responsive">--}}
                                    {{--@if(count($submissions)==0)--}}

                                        {{--<h1>Test</h1>--}}
                                    {{--@else--}}

                                        {{--=======================ELSE====================--}}

                                        {{--<table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list--}}
                                    {{--table-striped color-table success-table"--}}
                                               {{--data-page-size="10">--}}
                                            {{--<thead>--}}
                                            {{--<tr>--}}
                                                {{--<th> {{ __('strings.StudentName') }} </th>--}}
                                                {{--<th>{{ __('strings.AssignmentNumber') }}</th>--}}
                                                {{--<th> {{ __('strings.Progress') }} </th>--}}
                                                {{--</th>--}}
                                                {{--<th> {{ __('strings.LastUpdate') }}</th>--}}
                                            {{--</tr>--}}
                                            {{--</thead>--}}
                                            {{--<tbody>--}}
                                            {{--@foreach ($submissions as $submission)--}}
                                                {{--<tr>--}}
                                                    {{--<td> {{ $submission->area }}</td>--}}
                                                    {{--<td> {{ $submission->grade }}</td>--}}
                                                {{--<td>{{$assignment->startdate}}</td>--}}
                                                {{--<td>{{$assignment->deadline}}</td>--}}
                                                {{--<td>{{$assignment->available_date}}</td>--}}
                                                {{--<td>--}}
                                                    {{--@if($assignment->status == 0)--}}
                                                        {{--{{ __('strings.Active') }}--}}
                                                    {{--@else--}}
                                                        {{--{{ __('strings.Disactive') }}--}}
                                                    {{--@endif--}}
                                                {{--</td>--}}
                                                {{--</tr>--}}
                                            {{--@endforeach--}}
                                            {{--</tbody>--}}
                                            {{--<tfoot>--}}
                                            {{--<tr>--}}
                                            {{--<td colspan="2">--}}
                                            {{--<button type="button" class="btn btn-info btn-rounded"--}}
                                            {{--data-toggle="modal" data-target="#create-assignment">--}}
                                            {{--{{ __('strings.AddnewAssignment') }}--}}
                                            {{--</button>--}}
                                            {{--</td>--}}
                                            {{--Calling create modal--}}
                                            {{--@include('activities.modals.create-assignment')--}}

                                            {{--<td colspan="7">--}}
                                            {{--<div class="text-right">--}}
                                            {{--<ul class="pagination"></ul>--}}
                                            {{--</div>--}}
                                            {{--</td>--}}
                                            {{--</tr>--}}
                                            {{--</tfoot>--}}
                                        {{--</table>--}}


                                        {{--====================================================--}}


                                    {{--@endif--}}


                                {{--</div>--}}
                                {{--<!-- .left-aside-column-->--}}
                            {{--</div>--}}
                            {{--<!-- /.left-right-aside-column-->--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
        {{--Showing Assignment Status--}}
    </div>
    {{--@include('design.modals.create-assignment')--}}

    <script>
        function createAssignmentCleanDetails() {
            $("#case").html("");
            $("#number").html("");
            $("#instructions").val("");
            $("#assignment_id").val("");
        }
    </script>
    {{--<!--Modal for Assignment List-->--}}
    {{--@include('activities.modals.course-details')--}}
    {{--<!--Modal for Assignment Course List-->--}}
    {{--@include('activities.modals.assignmentCourse-details')--}}
    {{--Modal for copying an assignment--}}
    {{--@include('activities.modals.copy-assignment')--}}



    {{--<script>--}}

    {{--function assignDetails(assignment) {--}}
    {{--var  assignment = assignment;--}}

    {{--$("#case").html(assignment.case);--}}
    {{--$("#number").html(assignment.number);--}}
    {{--$("#instructions").html(assignment.instructions);--}}

    {{--$("#c_assign_case").val(assignment.case);--}}
    {{--$("#c_assign_number").val(assignment.number);--}}
    {{--$("#c_assign_instructions").val(assignment.instructions);--}}
    {{--$("#c_assign_id").val(assignment.id);--}}
    {{--console.log(assignment);--}}
    {{--}--}}

    {{--function assignCourseDetails(assignment) {--}}
    {{--var  assignment = assignment;--}}

    {{--$("#case2").html(assignment.case);--}}
    {{--$("#instructions2").html(assignment.instructions);--}}
    {{--$("#coursename2").html(assignment.course.name);--}}
    {{--$("#startdate2").html(assignment.startdate);--}}
    {{--$("#duedate2").html(assignment.deadline);--}}
    {{--$("#availabledate2").html(assignment.available_date);--}}
    {{--//            console.log(assignment);--}}
    {{--console.log(assignment);--}}
    {{--console.log(assignment.teachers)--}}
    {{--}--}}

    {{--function courseDetails(assignment) {--}}
    {{--var course = assignment;--}}
    {{--$("#name").html(assignment.course.name);--}}
    {{--$("#course_content").html(assignment.course.course_content);--}}
    {{--$("#course_startdate").html(assignment.course.startdate);--}}
    {{--$("#copy-button1").hide();--}}

    {{--//--}}
    {{--console.log(course)--}}
    {{--}--}}


    {{--</script>--}}


@endsection
