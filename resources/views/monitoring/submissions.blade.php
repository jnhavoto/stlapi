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
                        {{ __('strings.Submissions') }}
                        {{--Course Overview--}}
                    </h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">
                                {{ __('strings.Home') }}
                            </a></li>
                        <li class="breadcrumb-item active">
                            {{ __('strings.Submissions') }}
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
                    <div class="card">
                        <!-- .left-right-aside-column-->
                        <div class="contact-page-aside">

                            <div class="pl-4">
                                <div class="right-page-header">
                                    <div class="d-flex">
                                        <div class="align-self-center">
                                            <h4 class="card-title m-t-10">
                                                {{ __('strings.SubmissionsList') }}
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
                                            <th>{{ __('strings.StudentName') }} </th>
                                            <th>{{ __('strings.SubmissionDate') }} </th>
                                            <th>{{ __('strings.Action') }} </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($submissions as $submssion)
                                                <tr onclick="submissionDetails">
                                                    <td> {{ $submssion->student->user->first_name.' '
                                                .$submssion->student->user->last_name}}</td>
                                                    <td>
                                                        {{$submssion->submission_date}}
                                                    </td>
                                                    <td>
                                                        <a href="/submission-details/{{$submssion->id}}">
                                                            View
                                                        </a>
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
