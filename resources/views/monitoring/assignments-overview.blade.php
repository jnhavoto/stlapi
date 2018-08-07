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
                    <h3 class="text-themecolor m-b-0 m-t-0">Assignments</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Activities</li>
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
                                            <h4 class="card-title m-t-10">Assignment Submissions List </h4></div>
                                        <div class="ml-auto">
                                            <input type="text" id="demo-input-search2" placeholder="search assignments"
                                                   class="form-control"></div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list"
                                           data-page-size="10">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Student name</th>
                                            <th>Assignment name</th>
                                            <th>Submission Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($assSubmissions as $submission)
                                            @if($submission->status == 1)
                                                <tr>
                                                    {{--<td> {{ $assignment->students_id}}</td>--}}
                                                    <td> {{ $loop->index + 1 }}</td>
                                                    <td>
                                                        <img src="{{asset ("theme/images/users/1.jpg")}} " alt="user"
                                                             class="img-circle"/> <a href="/contact-details"
                                                                                     onclick="submissionDetails({{$submission}})">

                                                            @php
                                                                $student = \App\Models\Student::find
                                                                ($submission->students_id);
                                                            @endphp

                                                            {{  $student->user->first_name }}
                                                            {{  $student ->user->last_name }}

                                                        </a>
                                                    </td>
                                                    <td>
{{--                                                        <a href="/sub-details/{{$submission}}">--}}
                                                            <a href="/sub-details/{{$submission->id}}">
                                                        {{--<a href="/" data-toggle="modal"--}}
                                                           {{--data-target="#modalsSubmissionDetails"--}}
{{--                                                           onclick="submissionDetails({{$submission}})">--}}
                                                            {{$submission->assignment_description->case}}
                                                        </a>
                                                        {{--<a href="/submission-details"--}}
                                                           {{--onclick="submissionDetails({{$submission}})">--}}
                                                            {{--{{$submission->assignment_description->case}}--}}
                                                        {{--</a>--}}
                                                    </td>
                                                    {{--<td>{{$submission->submission_date}}</td>--}}
                                                    {{--<td>--}}
                                                        {{--<div class="progress-bar bg-success" role="progressbar"--}}
                                                             {{--style="width: 85%; height: 6px;" aria-valuenow="25"--}}
                                                             {{--aria-valuemin="0" aria-valuemax="100"></div>--}}
                                                    {{--</td>--}}
                                                    <td>
                                                        {{$submission->submission_date}}
                                                    </td>
                                                    <td> <a href="/" data-toggle="modal"
                                                            data-target="#modalsSubmissionDetails"
                                                            onclick="submissionDetails({{$submission}})"> View
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                        <tfoot>
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
                                            <h4 class="card-title m-t-10">Students Progress </h4></div>
                                        <div class="ml-auto">
                                            <input type="text" id="demo-input-search2" placeholder="search assignments"
                                                   class="form-control"></div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list
                                    table-striped"
                                           data-page-size="10">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Student name</th>
                                            <th>Assignment name</th>
                                            <th>Progress</th>
                                            <th>Last update</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($assSubmissions as $submission)
                                            @if($submission->status != 1)
                                                <tr>
                                                    {{--<td> {{ $assignment->students_id}}</td>--}}
                                                    <td> {{ $loop->index + 1 }}</td>
                                                    <td>
                                                        <img src="{{asset ("theme/images/users/1.jpg")}} " alt="user"
                                                             class="img-circle"/> <a href="/contact-details"
                                                                                     onclick="submissionDetails({{$submission}})">
                                                            @php
                                                                $student = \App\Models\Student::find
                                                                ($submission->students_id);
                                                            @endphp

                                                            {{  $student->user->first_name }}
                                                            {{  $student ->user->last_name }}

                                                        </a>
                                                    </td>

                                                    <td>
                                                        {{--<a href="/assignment_details">--}}
                                                        <a href="/" data-toggle="modal" data-target="#modalsAssDetails"
                                                           onclick="submissionDetails({{$submission}})">
                                                            {{$submission->assignment_description->case}}
                                                        </a>
                                                    </td>

                                                    {{--<td>{{$submission->submission_date}}</td>--}}
                                                    <td>
                                                        {{--<div class="progress-bar bg-success" role="progressbar"--}}
                                                             {{--style="width: 85%; height: 6px;" aria-valuenow="25"--}}
                                                             {{--aria-valuemin="0" aria-valuemax="100"></div>--}}
                                                        <div class="progress">
                                                            {{--<div class="progress-bar bg-success" role="progressbar"--}}
                                                                 {{--aria-valuenow="40" aria-valuemin="0"--}}
                                                                 {{--aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>--}}
                                                            <div class="progress progress-xs margin-vertical-10 ">
                                                                <div class="progress-bar bg-danger" style="width: 35% ;height:6px;"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{$submission->updated_at}}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach

                                        </tbody>
                                        <tfoot>
                                        {{--<tr>--}}
                                        {{--<td colspan="2">--}}
                                        {{--<button type="button" class="btn btn-info btn-rounded"--}}
                                        {{--data-toggle="modal" data-target="#add-new-assignment">Add New--}}
                                        {{--Assignment--}}
                                        {{--</button>--}}
                                        {{--</td>--}}


                                        {{--<div id="add-new-assignment" class="modal fade in" tabindex="-1" role="dialog"--}}
                                        {{--aria-labelledby="myModalLabel" aria-hidden="true">--}}
                                        {{--<div class="modal-dialog">--}}
                                        {{--<div class="modal-content">--}}
                                        {{--<div class="modal-header">--}}
                                        {{--<h4 class="modal-title" id="myModalLabel">Add New--}}
                                        {{--Assignment</h4>--}}
                                        {{--<button type="button" class="close" data-dismiss="modal"--}}
                                        {{--aria-hidden="true">×--}}
                                        {{--</button>--}}
                                        {{--</div>--}}
                                        {{--<div class="modal-body">--}}

                                        {{--=========================================================================--}}
                                        {{--============================= FORM  ====================================--}}
                                        {{--=========================================================================--}}
                                        {{--<form class="form-horizontal form-material"--}}
                                        {{--action="/submit_assignment" method="post">--}}

                                        {{--{{csrf_field()}}--}}

                                        {{--<div class="form-group">--}}

                                        {{--<div class="col-md-12 m-b-20">--}}
                                        {{--<label class="control-label">Assignment--}}
                                        {{--name</label>--}}
                                        {{--<input name="case" type="text"--}}
                                        {{--class="form-control">--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-12 m-b-20">--}}
                                        {{--<label class="control-label">Assignment--}}
                                        {{--number</label>--}}
                                        {{--<input name="number" type="number"--}}
                                        {{--class="form-control">--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-12 m-b-20">--}}
                                        {{--<label--}}
                                        {{--class="control-label">Instructions</label>--}}
                                        {{--<input name="instructions" type="textarea"--}}
                                        {{--class="form-control" rows="3">--}}
                                        {{--</div>--}}

                                        {{--<div class="col-md-12 m-b-20">--}}
                                        {{--<label class="control-label">Start date</label>--}}
                                        {{--<input name="startdate" type="date"--}}
                                        {{--class="form-control">--}}
                                        {{--</div>--}}

                                        {{--<div class="col-md-12 m-b-20">--}}
                                        {{--<label class="control-label">End date</label>--}}
                                        {{--<input name="deadline"--}}
                                        {{--type="date" class="form-control">--}}
                                        {{--</div>--}}

                                        {{--<div class="col-md-12 m-b-20">--}}
                                        {{--<label class="control-label">Available--}}
                                        {{--date</label>--}}
                                        {{--<input name="availabledate" type="date"--}}
                                        {{--class="form-control">--}}

                                        {{--</div>--}}
                                        {{--<div class="form-group">--}}
                                        {{--<div class="col-md-12 m-b-20">--}}
                                        {{--<h4 class="control-label">Select course  </h4>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<select class="js-example-basic-multiple" name="states[]" multiple="multiple" style="width: 100%">--}}
                                        {{--@foreach($courses as  $course)--}}
                                        {{--<option--}}
                                        {{--name="id"--}}
                                        {{--value="{{$course->id}}">{{$course->name}}</option>--}}
                                        {{--@endforeach--}}
                                        {{--</select>--}}

                                        {{--</div>--}}
                                        {{--<input class="btn btn-primary" type="submit">--}}
                                        {{--<div class="form-group">--}}
                                        {{--<div>--}}
                                        {{--<button type="submit" class="btn--}}
                                        {{--btn-success btn-rounded">Submit</button>--}}
                                        {{--<button type="button" class="btn btn-default--}}
                                        {{--btn-rounded waves-effect"--}}
                                        {{--data-dismiss="modal">Cancel--}}
                                        {{--</button>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</form>--}}
                                        {{--=========================================================================--}}
                                        {{--============================= //FORM ====================================--}}
                                        {{--=========================================================================--}}
                                        {{--</div>--}}
                                        {{--<div class="modal-footer">--}}

                                        {{--<button type="button" class="btn btn-default waves-effect"--}}
                                        {{--data-dismiss="modal">Cancel--}}
                                        {{--</button>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<!-- /.modal-content -->--}}
                                        {{--</div>--}}
                                        {{--<!-- /.modal-dialog -->--}}
                                        {{--</div>--}}
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
            <!-- End of Assignment - Courst List -->
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
