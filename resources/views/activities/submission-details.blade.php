@extends('layouts.layout')
@section('content')

    {{$submssion}}

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
                        <li class="breadcrumb-item active">Submission Details</li>
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                    <br>
                                    <p class="text-muted">Johnathan Deo</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                    <br>
                                    <p class="text-muted">(123) 456 7890</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                    <br>
                                    <p class="text-muted">johnathan@admin.com</p>
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
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list"
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
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                             style="width: 85%; height: 6px;" aria-valuenow="25"
                                                             aria-valuemin="0" aria-valuemax="100"></div>
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
            </div>
            <!-- ============================================================== -->
            <!-- End of Assignment - Courst List -->
            <!-- ============================================================== -->
        </div>
    </div>

    <div id="testetetetet">

    </div>


    <script>

        function submissionDetails(submission) {
            var  submission = submission;
            $("#case").html(submission.case);
            $("#number").html(submission.number);
            $("#instructions").html(submission.instructions);
            $("#startdate").html(submission.startdate);
            $("#duedate").html(submission.deadline);
            $("#availabledate").html(submission.available_date);
            console.log($submission);
        }

    </script>


@endsection
