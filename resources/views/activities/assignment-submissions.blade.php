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
                                            <h4 class="card-title m-t-10">Assignment Submissions </h4></div>
                                        <div class="ml-auto">
                                            <input type="text" id="demo-input-search2" placeholder="search contacts"
                                                   class="form-control"></div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list"
                                           data-page-size="10">
                                        <thead>
                                        <tr>
                                            <th>Student Id</th>
                                            <th>Assignment Id</th>
                                            <th>Submission Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($allAssSubmission as $ass_submission)
                                            <tr>
                                                {{--<td>{{$student->id}}</td>--}}
                                                <td> {{ $ass_submission->students_id}}</td>
                                                <td>
                                                    {{--<a href="/assignment_details">--}}
                                                    <a href="/" data-toggle="modal" data-target="#modalsAssDetails"
                                                       onclick="assignDetails({{$ass_submission}})">
                                                        {{$ass_submission->assignment_descriptions_id}}
                                                    </a>
                                                </td>
                                                <td>{{$assignment->submission_date}}</td>
                                                <td>
                                                    <button type="button"
                                                            class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn"
                                                            data-toggle="tooltip" data-original-title="Delete"><i
                                                                class="ti-close" aria-hidden="true"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <button type="button" class="btn btn-info btn-rounded"
                                                        data-toggle="modal" data-target="#add-new-assignment">Add New
                                                    Assignment
                                                </button>
                                            </td>


                                            <div id="add-new-assignment" class="modal fade in" tabindex="-1" role="dialog"
                                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Add New
                                                                Assignment</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            {{--=========================================================================--}}
                                                            {{--============================= FORM  ====================================--}}
                                                            {{--=========================================================================--}}
                                                            <form class="form-horizontal form-material"
                                                                  action="/submit_assignment" method="post">

                                                                {{csrf_field()}}

                                                                <div class="form-group">

                                                                    <div class="col-md-12 m-b-20">
                                                                        <label class="control-label">Assignment
                                                                            name</label>
                                                                        <input name="case" type="text"
                                                                               class="form-control">
                                                                    </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <label class="control-label">Assignment
                                                                            number</label>
                                                                        <input name="number" type="number"
                                                                               class="form-control">
                                                                    </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <label
                                                                                class="control-label">Instructions</label>
                                                                        <input name="instructions" type="textarea"
                                                                               class="form-control" rows="3">
                                                                    </div>

                                                                    <div class="col-md-12 m-b-20">
                                                                        <label class="control-label">Start date</label>
                                                                        <input name="startdate" type="date"
                                                                               class="form-control">
                                                                    </div>

                                                                    <div class="col-md-12 m-b-20">
                                                                        <label class="control-label">End date</label>
                                                                        <input name="deadline"
                                                                               type="date" class="form-control">
                                                                    </div>

                                                                    <div class="col-md-12 m-b-20">
                                                                        <label class="control-label">Available
                                                                            date</label>
                                                                        <input name="availabledate" type="date"
                                                                               class="form-control">

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <h4 class="control-label">Select course  </h4>
                                                                        </div>
                                                                    </div>
                                                                    <select class="js-example-basic-multiple" name="states[]" multiple="multiple" style="width: 100%">
                                                                        @foreach($courses as  $course)
                                                                            <option
                                                                                    name="id"
                                                                                    value="{{$course->id}}">{{$course->name}}</option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                                {{--<input class="btn btn-primary" type="submit">--}}
                                                                <div class="form-group">
                                                                    <div>
                                                                        <button type="submit" class="btn
                                                                        btn-success btn-rounded">Submit</button>
                                                                        <button type="button" class="btn btn-default
                                                                        btn-rounded waves-effect"
                                                                                data-dismiss="modal">Cancel
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            {{--=========================================================================--}}
                                                            {{--============================= //FORM ====================================--}}
                                                            {{--=========================================================================--}}
                                                        </div>
                                                        {{--<div class="modal-footer">--}}

                                                        {{--<button type="button" class="btn btn-default waves-effect"--}}
                                                        {{--data-dismiss="modal">Cancel--}}
                                                        {{--</button>--}}
                                                        {{--</div>--}}
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
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
              <!-- ============================================================== -->
            <!-- End of Assignment - Courst List -->
            <!-- ============================================================== -->
        </div>
    </div>

    <div id="testetetetet">

    </div>
    <!--Modal for Assignment List-->
    @include('activities.modals.assignment-details')
    <!--Modal for Assignment Course List-->
    @include('activities.modals.assignmentCourse-details')
    {{--Modal for copying an assignment--}}
    @include('activities.modals.copy-assignment')



    <script>

        function assignDetails(assignment) {
            var  assignment = assignment;
            $("#case").html(assignment.case);
            $("#number").html(assignment.number);
            $("#instructions").html(assignment.instructions);
            $("#startdate").html(assignment.startdate);
            $("#duedate").html(assignment.deadline);
            $("#availabledate").html(assignment.available_date);
            console.log(assignment);
        }

    </script>


@endsection
