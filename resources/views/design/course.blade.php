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
                        {{ __('strings.CourseDesign') }}
                        {{--Courses--}}
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
                                            <h4 class="card-title m-t-10">
                                                {{ __('strings.Course_TList') }}
                                                {{--Course Template List--}}
                                            </h4></div>
                                        <div class="ml-auto">
                                            <input type="text" id="demo-input-search2" placeholder="search courses"
                                                   class="form-control"> </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list
                                    table-striped color-table muted-table
" data-page-size="10">
                                        <thead>
                                        <tr>
                                            <th> {{ __('strings.No') }}
                                                {{--No--}}
                                            </th>
                                            <th>{{ __('strings.CourseName') }}
                                                {{--Full Name--}}
                                            </th>
                                            <th>{{ __('strings.CourseDescription') }}
                                                {{--Content--}}
                                            </th>
                                            <th>{{ __('strings.Action') }}
                                                {{--Action--}}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($courseTemplates as $course)
                                            <tr>
                                                {{--<td>{{$student->id}}</td>--}}
                                                <td> {{ $loop->index + 1 }}</td>
                                                <td>
                                                    {{--<a href="/" data-toggle="modal" data-target="#modalCourseDetails"--}}
                                                       {{--onclick="courseDetails({{$course}})">--}}
                                                        {{--<img src="{{asset ("theme/images/users/1.jpg")}} " alt="user" class="img-circle" />--}}
                                                        {{--{{$course->name}}--}}
                                                    {{--</a>--}}
                                                    {{$course->name}}
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
                                            <h4 class="card-title m-t-10">
                                                {{ __('strings.MyCList') }}
                                                {{--My Course List --}}
                                            </h4></div>
                                        <div class="ml-auto">
                                            <input type="text" id="demo-input-search2" placeholder="search courses"
                                                   class="form-control"> </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list
                                    table-striped color-table muted-table" data-page-size="10">
                                        <thead>
                                        <tr>
                                            <th> {{ __('strings.No') }}
                                                {{--No--}}
                                            </th>
                                            <th>{{ __('strings.CourseName') }}
                                                {{--Full Name--}}
                                            </th>
                                            <th>{{ __('strings.CourseDescription') }}
                                                {{--Content--}}
                                            </th>
                                            <th>{{ __('strings.Members') }}
                                                {{--Content--}}
                                            </th>
                                            <th>{{ __('strings.StartDate') }}
                                                {{--Date of Start--}}
                                            </th>
                                            <th>{{ __('strings.AvailableFrom') }}
                                                {{--Date of Start--}}
                                            </th>
                                            <th>{{ __('strings.Status') }}
                                                {{--Status--}}
                                            </th>
                                            <th>{{ __('strings.Action') }}
                                                {{--Status--}}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($teacherCourses as $course)
                                            <tr>
                                                {{--<td>{{$student->id}}</td>--}}
                                                <td> {{ $loop->index + 1 }}</td>
                                                <td>
                                                    <a href="/coursedesign-overview/{{$course->id}}" >
                                                        {{$course->name}}
                                                    </a>
                                                </td>
                                                <td>{{substr($course->course_content, 0, 45) }}</td>
                                                <td>
                                                    @php
                                                        $courseMembers = \App\Models\Course::find($course->id)->teachers;
                                                    @endphp
                                                    @foreach($courseMembers as $members)
                                                    {{
                                                        nl2br(e($members->user->first_name .' '.
                                                        $members->user->last_name)) }}
                                                    @endforeach
                                                </td>
                                                <td>{{$course->startdate}}</td>
                                                <td>{{$course->available_date}}</td>
                                                <td>
                                                    @if($course->status == 0) {{ __('strings.Active') }}
                                                    {{--Active--}}
                                                    @else
                                                        {{ __('strings.Disactive') }}
                                                        {{--Disactive--}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @php
                                                        $currentdate = Carbon\Carbon::now();
                                                    @endphp
                                                    {{--@if($course->available_date > $currentdate)--}}
                                                        <a href="/" data-toggle="modal" data-target="#update-course"
                                                           onclick="updateCourseDetails({{$course}})">
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
                                                <button type="button" onclick="courseCleanDetails()" class="btn
                                                btn-info btn-rounded"
                                                        data-toggle="modal" data-target="#create-course">
                                                    {{ __('strings.AddNewCourse') }}
                                                    {{--Add New Course--}}
                                                </button>
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
    @include('design.modals.course-details')
    <!--Modal for copping a course-->
    @include('design.modals.create-course')
    @include('design.modals.update-course')

    <script>
        function courseDetails(course) {
            var course = course;
            var startDate01 = formatDate(course.startdate);
            $("#name").html(course.name);
            $("#course_content").html(course.course_content);
            $("#c_course_name").val(course.name);
            $("#c_course_content").val(course.course_content);
            $("#c_course_startdates").val(startDate01);
            $("#c_course_available_date").val(course.available_date);
            $("#c_course_id").val(course.id);
            console.log(course)
        }

        function updateCourseDetails(course) {
            var course = course;
            var startDate01 = formatDate(course.startdate);
            var availableDate01 = formatDate(course.available_date);
            $("#c_course_name01").val(course.name);
            $("#c_course_content01").val(course.course_content);
            $("#c_course_startdate01").val(startDate01);
            $("#c_course_available_date01").val(availableDate01);
            $("#c_course_id").val(course.id);
            console.log(course)
        }

        function courseCleanDetails() {
            $("#name").html("");
            $("#course_content").html("");
            $("#c_course_name").val("");
            $("#c_course_content").val("");
            $("#c_course_id").val("");
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
