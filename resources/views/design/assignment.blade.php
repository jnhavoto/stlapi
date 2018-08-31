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
                        {{--Assignments--}}
                    </h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">
                                {{ __('strings.Home') }}
                                {{--Home--}}
                            </a></li>
                        <li class="breadcrumb-item active">
                            {{ __('strings.Design') }}
                            {{--Activities--}}
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
                                            <th>
                                                {{ __('strings.Number') }}
                                                {{--Number--}}
                                            </th>
                                            <th>
                                                {{ __('strings.AssignmentName') }}
                                                {{--Assignment name--}}
                                            </th>
                                            <th>
                                                {{ __('strings.Instructions') }}
                                                {{--Instructions--}}
                                            </th>
                                            <th>
                                                {{ __('strings.Action') }}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($assTemplates as $assignment)
                                            <tr>
                                                {{--<td>{{$student->id}}</td>--}}
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
                                                    <button type="button" class="btn btn-info btn-circle btn-lg m-r-5"
                                                            href="/" data-toggle="modal" data-target="#copy-assignment"
                                                            onclick="createAssignmentFromTemplate({{$assignment}})">
                                                        <i class="ti-clipboard"></i>
                                                    </button>
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
                                            <th> {{ __('strings.Number') }} </th>
                                            <th>{{ __('strings.AssignmentName') }} </th>
                                            {{--<th>{{ __('strings.CourseName') }} </th>--}}
                                            <th>{{ __('strings.Instructions') }} </th>
                                            <th>{{ __('strings.StartDate') }} </th>
                                            <th>{{ __('strings.EndDate') }} </th>
                                            <th>{{ __('strings.AvailableFrom') }} </th>
                                            <th>{{ __('strings.Status') }} </th>
                                            <th>{{ __('strings.Action') }} </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($teacherAssignment as $assignment)
                                            <tr>
                                                {{--<td>{{$student->id}}</td>--}}
                                                <td> {{ $assignment->assignment_description->number}}</td>
                                                {{--<td> {{ $t_assignment->name}}</td>--}}
                                                <td>
                                                    {{--list details of a course--}}
                                                    <a href="/" data-toggle="modal" data-target="#modalCourseDetails"
                                                       onclick="assignmentDetails({{$assignment}})">
                                                        {{$assignment->assignment_description->case}}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{substr($assignment->assignment_description->instructions, 0, 15)
                                                    }}{{$assignment->assignment_description->startdate}}
                                                </td>

                                                <td>{{$assignment->assignment_description->startdate}}</td>
                                                <td>{{$assignment->assignment_description->deadline}}</td>
                                                <td>{{$assignment->assignment_description->available_date}}</td>
                                                <td>
                                                    @if($assignment->assignment_description->status == 0)
                                                        {{ __('strings.Active') }}
                                                        {{--Active--}}
                                                    @else
                                                        {{ __('strings.Disactive') }}
                                                        {{--Disactive--}}
                                                    @endif
                                                </td>
                                                <td>
                                                    {{--@php--}}
                                                        {{--$currentdate = Carbon\Carbon::now();--}}
                                                    {{--@endphp--}}
                                                    {{--@if($t_assignment->available_date > $currentdate)--}}
                                                    <button type="button" class="btn btn-info btn-circle
                                                     btn-lg m-r-5"><i class="ti-key"></i></button>
                                                    {{--Update/Edit course--}}
                                                    {{--<a href="{{ url('/update_assignmentpage' . $problem->id . '/edit') }}" class="btn btn-xs btn-info pull-right">--}}
                                                        {{--Edit--}}
                                                    {{--</a>--}}
                                                    <a href="{{ url('/update_assignment/'
                                                    .$assignment->assignment_description->id)}}" class="btn btn-info
                                                     btn-circle btn-lg">
                                                        <i text-md-center class="ti-pencil-alt"></i>
                                                    </a>


                                                    {{--<button class="btn btn-info btn-circle btn-lg"--}}
                                                            {{--onclick="Location.href='{{url('update-assignment')}}'"--}}
                                                            {{--href="/update-assignment/{{$assignment->assignment_description}}"--}}
                                                            {{--data-toggle="modal"--}}
                                                            {{--data-target="#update-assignment"--}}
                                                            {{--data-cod="{{ $assignment->id }}"--}}
                                                            {{--onclick="updateAssignment({{$assignment}})"--}}

                                                    {{--> <i text-md-center class="ti-pencil-alt"></i>--}}

                                                    {{--</button>--}}
                                                    {{--Delete/Destroy the course--}}
                                                    <button type="button" class="btn btn-info btn-circle
                                                    btn-lg"
                                                            href="/"
                                                            data-toggle="modal"
                                                            data-target="#delete-assignment"
                                                            onclick="deteleAssignment({{$assignment->assignment_description}})">
                                                        <i text-md-center class="ti-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <button type="button" class="btn btn-info btn-rounded"
                                                        data-toggle="modal" data-target="#create-assignment">
                                                    {{ __('strings.AddNewAssignment') }}
                                                    {{--Add New Assignment--}}
                                                </button>
                                            </td>
                                            {{--Calling create modal--}}
                                            @include('design.modals.create-assignment')

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
    @include('design.modals.assignment-details')
    @include('design.modals.course-details')
    <!--Modal for Assignment Course List-->
    @include('design.modals.assignmentCourse-details')
    {{--Modal for copying an assignment--}}
    @include('design.modals.copy-assignment')
    @include('design.modals.update-assignment')
    @include('design.modals.delete-assignment')



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
            $("#c_case").val(assignment.case);
            $("#c_number").val(assignment.number);
            $("#c_instructions").html(assignment.instructions);
            $("#assignment_id").val(assignment.id);
            console.log(assignment);
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
