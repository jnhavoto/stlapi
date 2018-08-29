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
                                                       onclick="assignDetails({{$assignment}})">
                                                        {{$assignment->case}}
                                                    </a>
                                                </td>
                                                <td>{{substr($assignment->instructions, 0, 45) }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-circle btn-lg m-r-5"
                                                            href="/" data-toggle="modal" data-target="#copy-assignment"
                                                            onclick="assignDetails({{$assignment}})">
                                                        <i class="ti-clipboard"></i>
                                                    </button>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        {{--<tfoot>--}}
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
                                                            {{--<h4 class="modal-title" id="myModalLabel">--}}
                                                                {{--{{ __('strings.AddNewAssignment') }}--}}
                                                                {{--Add New Assignment--}}
                                                            {{--</h4>--}}
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
                                                                        {{--<label class="control-label">--}}
                                                                            {{--{{ __('strings.AssignmentName') }}--}}
                                                                            {{--Assignment name--}}
                                                                        {{--</label>--}}
                                                                        {{--<input name="case" type="text"--}}
                                                                               {{--class="form-control">--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="col-md-12 m-b-20">--}}
                                                                        {{--<label class="control-label">--}}
                                                                            {{--{{ __('strings.AssignmentNumber') }}--}}
                                                                            {{--Assignment number--}}
                                                                        {{--</label>--}}
                                                                        {{--<input name="number" type="number"--}}
                                                                               {{--class="form-control">--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="col-md-12 m-b-20">--}}
                                                                        {{--<label class="control-label">--}}
                                                                            {{--{{ __('strings.Instructions') }}--}}
                                                                            {{--Instructions--}}
                                                                        {{--</label>--}}
                                                                        {{--<input name="instructions" type="textarea"--}}
                                                                               {{--class="form-control" rows="3">--}}
                                                                    {{--</div>--}}

                                                                    {{--<div class="col-md-12 m-b-20">--}}
                                                                        {{--<label class="control-label">--}}
                                                                            {{--{{ __('strings.StartDate') }}--}}
                                                                            {{--Start date--}}
                                                                        {{--</label>--}}
                                                                        {{--<input name="startdate" type="date"--}}
                                                                               {{--class="form-control">--}}
                                                                    {{--</div>--}}

                                                                    {{--<div class="col-md-12 m-b-20">--}}
                                                                        {{--<label class="control-label">--}}
                                                                            {{--{{ __('strings.EndDate') }}--}}
                                                                            {{--End date--}}
                                                                        {{--</label>--}}
                                                                        {{--<input name="deadline"--}}
                                                                               {{--type="date" class="form-control">--}}
                                                                    {{--</div>--}}

                                                                    {{--<div class="col-md-12 m-b-20">--}}
                                                                        {{--<label class="control-label">--}}
                                                                            {{--{{ __('strings.AvailableDate') }}--}}
                                                                            {{--Available date--}}
                                                                        {{--</label>--}}
                                                                        {{--<input name="availabledate" type="date"--}}
                                                                               {{--class="form-control">--}}

                                                                    {{--</div>--}}
                                                                    {{--<div class="form-group">--}}
                                                                    {{--<div class="col-md-12 m-b-20">--}}
                                                                    {{--<h4 class="control-label">--}}
                                                                        {{--{{ __('strings.SelectCourse') }}--}}
                                                                        {{--Select course --}}
                                                                    {{--</h4>--}}
                                                                    {{--</div>--}}
                                                                    {{--</div>--}}
                                                                    {{--<select class="js-example-basic-multiple" name="states[]" multiple="multiple" style="width: 100%">--}}
                                                                    {{--@foreach($teacherCourses as  $course)--}}
                                                                    {{--<option--}}
                                                                            {{--name="selectTag"--}}
                                                                            {{--value="{{$course->id}}">{{$course->name}}</option>--}}
                                                                    {{--@endforeach--}}
                                                                    {{--</select>--}}

                                                                {{--</div>--}}
                                                                {{--<input class="btn btn-primary" type="submit">--}}
                                                                {{--<div class="form-group">--}}
                                                                    {{--<div>--}}
                                                                        {{--<button type="submit" class="btn--}}
                                                                        {{--btn-success btn-rounded">--}}
                                                                            {{--{{ __('strings.Submit') }}--}}
                                                                            {{--Submit--}}
                                                                        {{--</button>--}}
                                                                        {{--<button type="button" class="btn btn-default--}}
                                                                        {{--btn-rounded waves-effect"--}}
                                                                                {{--data-dismiss="modal">--}}
                                                                            {{--{{ __('strings.Cancel') }}--}}
                                                                            {{--Cancel--}}
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
                                            {{--<td colspan="7">--}}
                                                {{--<div class="text-right">--}}
                                                    {{--<ul class="pagination"></ul>--}}
                                                {{--</div>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--</tfoot>--}}
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
                                            <th>{{ __('strings.CourseName') }} </th>
                                            {{--<th>{{ __('strings.Instructions') }} </th>--}}
                                            <th>{{ __('strings.StartDate') }} </th>
                                            <th>{{ __('strings.EndDate') }} </th>
                                            <th>{{ __('strings.AvailableFrom') }} </th>
                                            <th>{{ __('strings.Status') }} </th>
                                            <th>{{ __('strings.Action') }} </th>
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
                                                        {{$t_assignment->course->name}}
                                                    </a>
                                                </td>
                                                {{--courseDetails($t_assignment->courses)--}}
                                                {{--<td>{{substr($t_assignment->instructions, 0, 45) }}</td>--}}
                                                <td>{{$t_assignment->startdate}}</td>
                                                <td>{{$t_assignment->deadline}}</td>
                                                <td>{{$t_assignment->available_date}}</td>
                                                <td>
                                                    @if($t_assignment->status == 0)
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
                                                        <a href="/" data-toggle="modal" data-target="#update-assignment"
                                                           onclick="updateAssignment({{$t_assignment}})">
                                                            Edit
                                                        </a>
                                                    {{--@else--}}
                                                        {{--Edit--}}
                                                    {{--@endif--}}
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



    <script>

        function assignDetails(assignment) {
            var  assignment = assignment;
            $("#case").html(assignment.case);
            $("#number").html(assignment.number);
            $("#instructions").html(assignment.instructions);
            //copy assignment
            $("#c_assign_case").val(assignment.case);
            $("#c_assign_number").val(assignment.number);
            $("#c_assign_instructions").val(assignment.instructions);
            $("#c_assign_id").val(assignment.id);
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
