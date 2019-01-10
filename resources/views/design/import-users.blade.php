@extends('layouts.layout_admin')
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
                        {{ __('strings.ImportUsers') }}
                    </h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">  {{ __('strings.Home') }} </a>
                        </li>
                        <li class="breadcrumb-item active"> {{ __('strings.Users') }}
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
                        <div class="card-body">
                            <div class="container">
                                <h2 class="text-center">
                                    {{ __('strings.ImportExcelCSV') }}
                                </h2>

                                @if ( Session::has('success') )
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <strong>{{ Session::get('success') }}</strong>
                                    </div>
                                @endif

                                @if ( Session::has('error') )
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <strong>{{ Session::get('error') }}</strong>
                                    </div>
                                @endif

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <div>
                                            @foreach ($errors->all() as $error)
                                                <p>{{ $error }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <form action="/import" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    Choose your xls/csv File : <input type="file" name="file" class="form-control">

                                    <input type="submit" class="btn btn-primary btn-lg" style="margin-top: 3%">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End of Assignment List -->
         </div>
    </div>

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
