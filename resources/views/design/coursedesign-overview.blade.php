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
                        {{ __('strings.CourseOverview') }}
                        {{--Course Overview--}}
                    </h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">
                                {{ __('strings.Home') }}
                            </a></li>
                        <li class="breadcrumb-item"><a href="/courses">
                                {{ __('strings.Courses') }}
                            </a>
                        </li>
                        <li class="breadcrumb-item">   {{ __('strings.CourseDetails') }}
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
                <div class="col-lg-6 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex flex-wrap">
                                        <div>
                                            <h3 class="card-title">{{ __('strings.CourseDetails') }}</h3>
                                            {{--<h6 class="card-subtitle">Ample Admin Vs Pixel Admin</h6>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="col-md-6 m-b-20">
                                        <h4>{{ __('strings.CourseName') }}</h4>
                                        <label> {{ $course->name }} </label>
                                    </div>
                                    <div>
                                        <hr class="m-t-0 m-b-0">
                                    </div>
                                    <div class="col-md-4 m-b-20">
                                        <h4 class="control-label">{{ __('strings.StartDate') }}</h4>
                                        <label> {{ $course->startdate }} </label>
                                    </div> <div>
                                        <hr class="m-t-0 m-b-0">
                                    </div>
                                    <div class="col-md-4 m-b-20">
                                        <h4 class="control-label">{{ __('strings.AvailableDate') }}</h4>
                                        <label> {{$course->available_date }}</label>
                                    </div>
                                    <div>
                                        <hr class="m-t-0 m-b-0">
                                    </div>
                                    <div class="col-md-6 m-b-20">
                                        <h4 class="control-label">{{ __('strings.Members') }} </h4>
                                        @foreach($courseMembers as $members)
                                            <label>
                                                {{$members->teacher->user->first_name .' '.$members->teacher->user->last_name }}
                                            </label>
                                            <br/>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> {{ __('strings.Instructions') }} </h4>
                            {{--<h6 class="card-subtitle">Different Devices Used to Visit</h6>--}}
                            <label> {{$course->course_content }}</label>
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
                                            <input type="text" id="demo-input-search2" placeholder="{{ __('strings.SearchAssignments') }}"
                                                   class="form-control">
                                        </div>

                                    </div>
                                    <div class="ml-auto">
                                        <td colspan="2">
                                            <button type="button" class="btn btn-info btn-rounded"
                                                    data-toggle="modal"
                                                    data-target="#confirm-createassignment"
                                                    onclick="createAssignmentCleanDetails()"
                                            >
                                                {{ __('strings.AddAssignment') }}
                                            </button>
                                        </td>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    {{--@if(count($courseAssignments)!=0)--}}
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list
                                    table-striped color-table muted-table"
                                           data-page-size="10">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            {{--<th> {{ __('strings.AssignmentNumber') }} </th>--}}
                                            <th> {{ __('strings.AssignmentName') }} </th>
                                            {{--<th> {{ __('strings.Instructions') }} </th>--}}
                                            {{--</th>--}}
                                            <th> {{ __('strings.StartDate') }}</th>
                                            <th> {{ __('strings.EndDate') }} </th>
                                            <th> {{ __('strings.AvailableFrom') }}</th>
                                            <th> {{ __('strings.Status') }} </th>
                                            <th> {{ __('strings.Action') }} </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($courseAssignments as $assignment)
                                            <tr>
                                                <td> {{ $assignment->number }}</td>
                                                <td>
                                                    <a href="/assignmentdesign-overview/{{$assignment->id}}">
                                                        {{$assignment->case}}
                                                    </a>

                                                </td>
                                                <td>{{$assignment->startdate}}</td>
                                                <td>{{$assignment->deadline}}</td>
                                                <td>{{$assignment->available_date}}</td>
                                                <td>
                                                    @if($assignment->status == 0)
                                                        {{ __('strings.Active') }}
                                                    @else
                                                        {{ __('strings.Disactive') }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-circle
                                                     btn-lg m-r-5"><i class="ti-key"></i></button>
                                                    <a href="{{ url('/update_assignment/'
                                                    .$assignment->id)}}" class="btn btn-info
                                                     btn-circle btn-lg">
                                                        <i text-md-center class="ti-pencil-alt"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-info btn-circle
                                                    btn-lg"
                                                            href="/"
                                                            data-toggle="modal"
                                                            data-target="#confirm-delete-assignment"
                                                            {{--onclick="deteleAssignment({{$assignment->assignment_description}})"--}}
                                                    >
                                                        <i text-md-center class="ti-trash"></i>
                                                    </button>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="7">
                                                <div class="text-right">
                                                    <ul class="pagination"></ul>
                                                </div>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                        {{--@else--}}
                                        {{--<div>--}}
                                            {{--<div>--}}
                                                {{--<h4>No Assignments</h4>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--@endif--}}
                                </div>
                                <!-- .left-aside-column-->
                            </div>
                            <!-- /.left-right-aside-column-->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 m-b-20">
                <label class="card-title"> {{ __('strings.CourseMaterial') }}  </label>
                <hr>

                <div class="col-md-6">
                    <form id="file-input" class="dropzone">
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                    </form>
                </div>

                <div>
                    @if($materials->count() > 0)
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap
                                    table-striped color-table muted-table" style="width: auto" >
                            <thead>
                            <tr>
                                <th >File name</th>
                                <th >Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($materials as $material)
                                <tr>
                                    <td>{{$material->file_name}}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm
                                                    " href="{{ asset($material->path) }}"
                                           download="{{ $material->path }}">
                                            <i text-md-center class="ti-download"> </i>
                                        </a>
                                        <a class="btn btn-danger btn-sm"
                                           href="/delete_course_file/{{$material->id}}"
                                        >
                                            <i text-md-center class="ti-trash"> </i> </a>

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
            <hr><hr>

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
                                                {{ __('strings.CourseMaterial') }}
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="ml-auto">
                                        <td colspan="2">
                                            <button type="button" class="btn btn-info btn-rounded"
                                                    data-toggle="modal"
                                                    data-target="#confirm-createassignment"
                                                    onclick="createAssignmentCleanDetails()">
                                                {{ __('strings.AddCourseMaterial') }}
                                            </button>
                                        </td>
                                    </div>
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

    {{--Begin: Confirm Assignment Create in Course design--}}
    <div id="confirm-createassignment" class="modal fade in" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        {{ __('strings.CreateFromTemplate') }}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <a href="{{ url('/assignment-templates/'.$course->id)}}"
                           class="btn btn-success btn-rounded">
                            {{ __('strings.Yes') }}
                        </a>
                        <a  class="btn btn-warning btn-rounded"
                            data-toggle="modal"
                            data-target="#create-assignmentFromCourseOverview"
                                data-dismiss="modal"
                                >
                            {{ __('strings.No') }}
                            {{--Cancel--}}
                        </a>
                    </div>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    @include('design.modals.create-assignmentFromCourseOverview')

    <script>
        function createAssignmentCleanDetails() {
            $("#case").html("");
            $("#number").html("");
            $("#instructions").val("");
            $("#assignment_id").val("");
        }
    </script>

@endsection
