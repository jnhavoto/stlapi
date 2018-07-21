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
                {{--<div class="col-md-7 col-4 align-self-center">--}}
                    {{--<div class="d-flex m-t-10 justify-content-end">--}}
                        {{--<div class="d-flex m-r-20 m-l-10 hidden-md-down">--}}
                            {{--<div class="chart-text m-r-10">--}}
                                {{--<h6 class="m-b-0">--}}
                                    {{--<small>THIS MONTH</small>--}}
                                {{--</h6>--}}
                                {{--<h4 class="m-t-0 text-info">$58,356</h4></div>--}}
                            {{--<div class="spark-chart">--}}
                                {{--<div id="monthchart"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="d-flex m-r-20 m-l-10 hidden-md-down">--}}
                            {{--<div class="chart-text m-r-10">--}}
                                {{--<h6 class="m-b-0">--}}
                                    {{--<small>LAST MONTH</small>--}}
                                {{--</h6>--}}
                                {{--<h4 class="m-t-0 text-primary">$48,356</h4></div>--}}
                            {{--<div class="spark-chart">--}}
                                {{--<div id="lastmonthchart"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="">--}}
                            {{--<button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10">--}}
                                {{--<i class="ti-settings text-white"></i></button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
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
                                            <h4 class="card-title m-t-10">Assignment List </h4></div>
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
                                            <th>Number</th>
                                            <th>Assignment name</th>
                                            <th>Instructions</th>
                                            <th>Date of Start</th>
                                            <th>Due Date</th>
                                            <th>Available from</th>
                                            {{--<th>Joining date</th>--}}
                                            {{--<th>Salery</th>--}}
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($allassignments as $assignment)
                                            <tr>
                                                {{--<td>{{$student->id}}</td>--}}
                                                <td> {{ $assignment->number}}</td>
                                                <td>
                                                    {{--<a href="/assignment_details">--}}
                                                    <a href="/" data-toggle="modal" data-target="#modalsAssDetails"
                                                       onclick="assignDetails({{$assignment}})">
                                                        {{$assignment->case}}
                                                    </a>
                                                </td>
                                                <td>{{substr($assignment->instructions, 0, 45) }}</td>
                                                <td>{{$assignment->startdate}}</td>
                                                <td>{{$assignment->deadline}}</td>
                                                <td>{{$assignment->available_date}}</td>
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
                                            {{--<td colspan="2">--}}
                                                {{--<button type="button" class="btn btn-info btn-rounded"--}}
                                                        {{--data-toggle="modal" data-target="#add-new-assignment">Add New--}}
                                                    {{--Assignment--}}
                                                {{--</button>--}}
                                            {{--</td>--}}

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
                                                                            name="selectTag"
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- .left-right-aside-column-->
                        <div class="contact-page-aside">

                            <div class="pl-4">
                                <div class="right-page-header">
                                    <div class="d-flex">
                                        <div class="align-self-center">
                                            <h4 class="card-title m-t-10">My Assignment Course List </h4></div>
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
                                            <th>Number</th>
                                            <th>Assignment name</th>
                                            <th>Course no</th>
                                            <th>Instructions</th>
                                            <th>Date of Start</th>
                                            <th>Due Date</th>
                                            <th>Available from</th>
                                            {{--<th>Joining date</th>--}}
                                            {{--<th>Salery</th>--}}
                                            <th>Action</th>
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
                                                        {{$t_assignment->courses_id}}
                                                    </a>
                                                </td>
                                                {{--courseDetails($t_assignment->courses)--}}
                                                <td>{{substr($t_assignment->instructions, 0, 45) }}</td>
                                                <td>{{$t_assignment->startdate}}</td>
                                                <td>{{$t_assignment->deadline}}</td>
                                                <td>{{$t_assignment->available_date}}</td>
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
                                                        data-toggle="modal" data-target="#add-assignment-course">Add New
                                                    Assignment Course
                                                </button>
                                            </td>


                                            <div id="add-assignment-course" class="modal fade in" tabindex="-1" role="dialog"
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
                                                                                    name="selectTag"
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

        function assignCourseDetails(assignment) {
            var  assignment = assignment;

            $("#case2").html(assignment.case);
            $("#instructions2").html(assignment.instructions);
//            $("#coursename").html(assignment.courses.name);
            $("#startdate2").html(assignment.startdate);
            $("#duedate2").html(assignment.deadline);
            $("#availabledate2").html(assignment.available_date);
//            console.log(assignment);
            console.log(assignment.courses);
            console.log(assignment.teachers)
        }

        function courseDetails(course) {
            var course = course;
            $("#name").html(course.name);
            $("#course_content").html(course.course_content);
            $("#created").html(course.created_at);
            console.log(course)
        }

    </script>


@endsection
