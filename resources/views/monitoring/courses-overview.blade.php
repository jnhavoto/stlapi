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
                        {{ __('strings.CoursesOverview') }}
                        {{--Course Overview--}}
                    </h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">
                                {{ __('strings.Home') }}
                                {{--Home--}}
                            </a></li>
                        <li class="breadcrumb-item active">
                            {{ __('strings.CourseDetails') }}
                            {{--Course details--}}
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
                <div class="col-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">{{ __('strings.CourseList') }}</h4>
                        </div>    <!-- .left-right-aside-column-->
                        <div class="contact-page-aside">
                            <div class="pl-4">
                                {{--<div class="right-page-header">--}}
                                    {{--<div class="d-flex">--}}
                                        {{--<div class="align-self-center">--}}
                                            {{--<h4 class="card-title m-t-10">--}}
                                                {{--{{ __('strings.CourseList') }}--}}
                                                {{--My Assignment List--}}
                                            {{--</h4></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list
                                    table-striped color-table info-table"
                                           data-page-size="10">
                                        <thead>
                                        <tr>
                                            <th> #</th>
                                            <th>{{ __('strings.CourseName') }} </th>
                                            <th>{{ __('strings.StartDate') }} </th>
                                            <th>{{ __('strings.AvailableFrom') }} </th>
                                            <th>{{ __('strings.Status') }}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($courses as $course)
                                            <tr>
                                                <td> {{ $course->course->id}}</td>
                                                <td>
                                                    <a href="/course-overview/{{$course->course->id}}" >
                                                        {{ $course->course->name }}
                                                    </a>
                                                </td>
                                                {{--<td> {{substr($course->course_content, 0, 45) }} </td>--}}
                                                <td> {{ $course->course->startdate}}</td>
                                                <td> {{ $course->course->available_date}}</td>
                                                <td>
                                                    @if($course->course->status == 0)
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
                                            <input type="text" id="demo-input-search2"
                                                   placeholder="{{ __('strings.SearchAssignments') }}"
                                                   class="form-control"></div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list
                                    table-striped color-table muted-table"
                                           data-page-size="10">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            {{--<th> {{ __('strings.AssignmentNumber') }} </th>--}}
                                            <th> {{ __('strings.AssignmentName') }} </th>
                                            <th> {{ __('strings.Progress') }} </th>
                                            <th> {{ __('strings.StartDate') }}</th>
                                            <th> {{ __('strings.EndDate') }} </th>
                                            <th> {{ __('strings.AvailableFrom') }}</th>
                                            <th> {{ __('strings.Status') }} </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($assignments as $assignment)
                                            @if($assignment->assignment_description != null)
                                            <tr>
                                                <td> {{ $assignment->assignment_description->number }}</td>
                                                <td>
                                                    <a href="/assignment-designoverview/{{$assignment->id}}">
                                                        {{--<img src="{{asset ("theme/images/users/1.jpg")}} " alt="user" class="img-circle" />--}}
                                                        {{$assignment->assignment_description->case}}
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
                                                    <a href="/list-submissions/{{$assignment->id}}">
                                                        <div class="progress progress-xs margin-vertical-10 ">
                                                            <div class="progress-bar bg-danger" style="width: {{$progress}}%;
                                                                    height:12px;"></div>
                                                        </div>
                                                    </a>

                                                </td>

                                                <td>{{$assignment->assignment_description->startdate}}</td>
                                                <td>{{$assignment->assignment_description->deadline}}</td>
                                                <td>{{$assignment->assignment_description->available_date}}</td>
                                                <td>
                                                    @if($assignment->assignment_description->status == 0)
                                                        {{ __('strings.Active') }}
                                                    @else
                                                        {{ __('strings.Disactive') }}
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
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

        </div>
        {{--Showing Assignment Status--}}
    </div>

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
