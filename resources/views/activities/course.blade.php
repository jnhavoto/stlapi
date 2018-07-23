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
                    <h3 class="text-themecolor m-b-0 m-t-0">Courses</h3>
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
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start of Course list -->
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
                                            <h4 class="card-title m-t-10">Course Template List </h4></div>
                                        <div class="ml-auto">
                                            <input type="text" id="demo-input-search2" placeholder="search contacts" class="form-control"> </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Content</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($courseTemplates as $course)
                                            <tr>
                                                {{--<td>{{$student->id}}</td>--}}
                                                <td> {{ $loop->index + 1 }}</td>
                                                <td>
                                                    <a href="/" data-toggle="modal" data-target="#modalCourseDetails"
                                                       onclick="courseDetails({{$course}})">
                                                        {{--<img src="{{asset ("theme/images/users/1.jpg")}} " alt="user" class="img-circle" />--}}
                                                        {{$course->name}}
                                                    </a>
                                                </td>
                                                <td>{{substr($course->course_content, 0, 45) }}</td>
                                                <td> <a href="/" data-toggle="modal" data-target="#create-course"
                                                        onclick="courseDetails({{$course}})">
                                                        {{--<img src="{{asset ("theme/images/users/1.jpg")}} " alt="user" class="img-circle" />--}}
                                                        Copy
                                                    </a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            {{--<td colspan="2">--}}
                                                {{--<button type="button" class="btn btn-info btn-rounded"--}}
                                                        {{--data-toggle="modal" data-target="#add-course">Add New--}}
                                                    {{--Course</button>--}}
                                            {{--</td>--}}

                                            {{--<div id="add-course" class="modal fade in" tabindex="-1" role="dialog"--}}
                                                 {{--aria-labelledby="myModalLabel" aria-hidden="true">--}}
                                                {{--<div class="modal-dialog">--}}
                                                    {{--<div class="modal-content">--}}
                                                        {{--<div class="modal-header">--}}
                                                            {{--<h4 class="modal-title" id="myModalLabel">Add New--}}
                                                                {{--Course</h4>--}}
                                                            {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="modal-body">--}}
                                                            {{--=========================================================================--}}
                                                            {{--============================= FORM  ====================================--}}
                                                            {{--=========================================================================--}}
                                                            {{--<form class="form-horizontal form-material"--}}
                                                                  {{--action="/submit_course" method="post">--}}
                                                                {{--{{csrf_field()}}--}}
                                                                {{--<div class="form-group">--}}

                                                                    {{--<div class="col-md-12 m-b-20">--}}
                                                                        {{--<label class="control-label">Course name</label>--}}
                                                                        {{--<div>--}}
                                                                            {{--<input name="name" type="text" class="form-control input-lg" value="">--}}
                                                                        {{--</div>--}}
                                                                    {{--</div>--}}

                                                                    {{--<div class="col-md-12 m-b-20">--}}
                                                                        {{--<label class="control-label">Course Content</label>--}}
                                                                        {{--<input name="course_content" type="textarea"--}}
                                                                               {{--class="form-control" rows="3">--}}
                                                                    {{--</div>--}}

                                                                    {{--<div class="col-md-12 m-b-20">--}}
                                                                        {{--<label class="control-label">Start date</label>--}}
                                                                        {{--<input name="startdate" type="date"--}}
                                                                               {{--class="form-control">--}}
                                                                    {{--</div>--}}
                                                                {{--</div>--}}
                                                                {{--<div class="form-group">--}}
                                                                    {{--<button type="submit" class="btn btn-success btn-rounded">Submit</button>--}}
                                                                    {{--<button type="button" class="btn btn-default btn-rounded waves-effect"--}}
                                                                            {{--data-dismiss="modal">Cancel--}}
                                                                    {{--</button>--}}
                                                                {{--</div>--}}
                                                                {{--<input class="btn btn-primary " type="submit">--}}
                                                            {{--</form>--}}
                                                            {{--=========================================================================--}}
                                                            {{--============================= //FORM ====================================--}}
                                                            {{--=========================================================================--}}

                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<!-- /.modal-content -->--}}
                                                {{--</div>--}}
                                                {{--<!-- /.modal-dialog -->--}}
                                            {{--</div>--}}
                                            <td colspan="7">
                                                <div class="text-right">
                                                    <ul class="pagination"> </ul>
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
            <!-- End of Course list -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start of My Course list -->
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
                                            <h4 class="card-title m-t-10">My Course List </h4></div>
                                        <div class="ml-auto">
                                            <input type="text" id="demo-input-search2" placeholder="search contacts" class="form-control"> </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Content</th>
                                            <th>Date of Start</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($teacherCourses as $course)
                                            <tr>
                                                {{--<td>{{$student->id}}</td>--}}
                                                <td> {{ $loop->index + 1 }}</td>
                                                <td>
                                                    {{$course->name}}
                                                    {{--<a href="/" data-toggle="modal" data-target="#modalCourseDetails"--}}
                                                       {{--onclick="courseDetails({{$course}})">--}}
                                                        {{--<img src="{{asset ("theme/images/users/1.jpg")}} " alt="user" class="img-circle" />--}}
                                                        {{--{{$course->name}}--}}
                                                    {{--</a>--}}
                                                </td>
                                                <td>{{substr($course->course_content, 0, 45) }}</td>
                                                <td>{{$course->startdate}}</td>
                                                <td>
                                                    @if($course->status == 0)Active.
                                                    @else
                                                        Disactive
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <button type="button" onclick="courseCleanDetails()" class="btn
                                                btn-info btn-rounded"
                                                        data-toggle="modal" data-target="#create-course">Add New
                                                    Course</button>
                                            </td>


                                            <td colspan="7">
                                                <div class="text-right">
                                                    <ul class="pagination"> </ul>
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
            <!-- End of My Courses list -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
        </div>
    </div>

    <!--Modal for course details-->
    @include('activities.modals.course-details')
    <!--Modal for copping a course-->
    @include('activities.modals.create-course')

    <script>
        function courseDetails(course) {
            var course = course;
            $("#name").html(course.name);
            $("#course_content").html(course.course_content);

            $("#c_course_name").val(course.name);
            $("#c_course_content").val(course.course_content);
            $("#c_course_id").val(course.id);
            //            storage.setItem('couse_name', course.name);
            //             storage.setItem('couse_content', course.course_content);
            console.log(course)
        }

        function courseCleanDetails() {
            $("#name").html("");
            $("#course_content").html("");

            $("#c_course_name").val("");
            $("#c_course_content").val("");
            $("#c_course_id").val("");
            //            storage.setItem('couse_name', course.name);
            //             storage.setItem('couse_content', course.course_content);
            console.log(course)
        }
    </script>
@endsection
