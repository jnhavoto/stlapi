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
                        {{ __('strings.AssignmentDesign') }}
                    </h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">  {{ __('strings.Home') }} </a>
                        </li>
                        <li class="breadcrumb-item active"> {{ __('strings.Design') }}
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
                                                {{ __('strings.AssignmentTemplateList') }}
                                                {{--Assignment Template List--}}
                                            </h4>
                                            <label>{{ __('strings.CreateInstruction') }}</label>
                                        </div>
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
                                            <th> {{ __('strings.Number') }} </th>
                                            <th> {{ __('strings.AssignmentName') }} </th>
                                            <th> {{ __('strings.Instructions') }} </th>
                                            <th> {{ __('strings.Action') }} </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($assTemplates as $assignment)
                                            <tr>
                                                <td> {{ $assignment->number}}</td>
                                                <td>
                                                    {{--<a href="/assignment_details">--}}
                                                    <a href="/" data-toggle="modal" data-target="#modalsAssDetails"
                                                       onclick="showAssignmentDetails({{$assignment}})">
                                                        {{$assignment->case}}
                                                    </a>
                                                </td>
                                                <td>{{substr($assignment->instructions, 0, 45) }}</td>
                                                <td>
                                                    <a class="btn btn-info btn-circle btn-lg m-r-5"
                                                       href="/assignment-getfromtemplate/{{$assignment->id}}">
                                                        <i text-md-center class="ti-clipboard"></i>
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
         </div>
    </div>

    <!--Modal for Assignment List-->
    @include('design.modals.assignment-details')
    {{--@include('design.modals.course-details')--}}
    <!--Modal for Assignment Course List-->
    @include('design.modals.assignmentCourse-details')
    {{--Modal for copying an assignment--}}
    @include('design.modals.copy-assignment')
    @include('design.modals.update-assignment')
    @include('design.modals.confirm-delete-assignment')
    @include('design.modals.create-assignmentFromTemplate')



    <script>
        //show details in the modals.assignment-details
        function showAssignmentDetails(assignment) {
            var  assignment = assignment;
            $("#case").html(assignment.case);
            $("#number").html(assignment.number);
            $("#instructions").html(assignment.instructions);
        }

        //show copied details in the modals.copy-assignment
        function createAssignmentFromTemplate(assignment) {
            var  assignment = assignment;
            $("#ccase").val(assignment.case);
            $("#cnumber").val(assignment.number);
            $("#cinstructions").html(assignment.instructions);
            $("#assignment_id").val(assignment.id);
            console.log(assignment);
        }

        function createAssignmentCleanDetails() {
            $("#case").html("");
            $("#number").html("");
            $("#instructions").val("");
            $("#assignment_id").val("");
        }

        //Update assignment: getting values
        function updateAssignment(assignment) {
            var  assignment = assignment;
            var startDate01 = formatDate(assignment.startdate);
            var deadline01 = formatDate(assignment.deadline);
            $("#c_assignment_name").val(assignment.case);
            $("#c_assignment_number").val(assignment.number);
            $("#c_assignment_instructions").val(assignment.instructions);
            $("#c_assignment_startdate").val(startDate01);
            $("#c_assignment_enddate").val(deadline01);
            $("#c_assignment_availabledate").val(assignment.available_date);
            $("#assignment_id").val(assignment.id);

            console.log(assignment);
        }

        function assignCourseDetails(assignment) {
            var  assignment = assignment;

            $("#case2").html(assignment.case);
            $("#instructions2").html(assignment.instructions);
            $("#coursename2").html(assignment.course.name);
            $("#startdate2").html(assignment.startdate);
            $("#duedate2").html(assignment.deadline);
            $("#availabledate2").html(assignment.available_date);
//            console.log(assignment);
            console.log(assignment);
            console.log(assignment.teachers)
        }

        function courseDetails(assignment) {
            var course = assignment;
            $("#name").html(assignment.course.name);
            $("#course_content").html(assignment.course.course_content);
            $("#course_startdate").html(assignment.course.startdate);
            $("#copy-button1").hide();
            console.log(course)
        }

        function deteleAssignment(assignment) {
            var assignment = assignment;
            $("#deleteassignment_id").val(assignment.id);
            console.log(assignment.id)
        }


        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();
            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return [year, month, day].join('-');
        }
        

    </script>


@endsection
