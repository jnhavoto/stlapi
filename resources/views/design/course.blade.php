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
                                                   class="form-control"></div>
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

                                        @foreach ($coursesTemplates as $course)
                                            <tr>
                                                {{--<td>{{$student->id}}</td>--}}
                                                <td> {{ $loop->index + 1 }}</td>
                                                <td>
                                                    {{$course->name}}
                                                </td>
                                                <td>{{substr($course->course_content, 0, 45) }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-circle btn-lg m-r-5"
                                                            href="/" data-toggle="modal" data-target="#create-course"
                                                            onclick="copyCourse({{$course}})">
                                                        <i class="ti-clipboard"></i>
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
                                                   class="form-control"></div>
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
                                                    <a href="/coursedesign-overview/{{$course->course->id}}">
                                                        {{$course->course->name}}
                                                    </a>
                                                </td>
                                                <td>{{substr($course->course->course_content, 0, 45) }}</td>
                                                <td>
                                                    @php
                                                        $courseMembers = \App\Models\TeacherCourse::with('teacher')->where
                                                        ('courses_id',$course->course->id)->get();
                                                    @endphp
                                                    @foreach($courseMembers as $members)
                                                        <a
                                                                href="/contact-details-other/{{$members->teacher->user->id}}">{{
                                                        $members->teacher->user->first_name .' '.$members->teacher->user->last_name
                                                    }}</a>
                                                        <br/>
                                                    @endforeach
                                                </td>
                                                <td>{{$course->course->startdate}}</td>
                                                <td>{{$course->course->available_date}}</td>
                                                <td>
                                                    @if($course->course->status == 0) {{ __('strings.Active') }}
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
                                                    {{--Change course status: active vs disactive--}}
                                                    <button type="button" class="btn btn-info btn-circle
                                                     btn-lg m-r-5"><i class="ti-key"></i></button>
                                                    {{--Update/Edit course--}}
                                                    <button type="button" class="btn btn-info btn-circle btn-lg"
                                                            href="/"
                                                            data-toggle="modal"
                                                            data-target="#update-course"
                                                            data-cod="{{ $course->course->id }}"
                                                            onclick="updateCourseDetails({{$course->course}})">
                                                        <i text-md-center class="ti-pencil-alt"></i>

                                                    </button>
                                                    {{--Delete/Destroy the course--}}
                                                    <button type="button" class="btn btn-info btn-circle
                                                    btn-lg" href="/" data-toggle="modal" data-target="#delete-course"
                                                            onclick="deleteCourse({{$course->course}})">
                                                        <i text-md-center class="ti-trash"></i>
                                                    </button>
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
    @include('design.modals.delete-course')

    <script>
        function copyCourse(course) {
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

            $('.update-course').val("");

            var course = course;
            var startDate01 = formatDate(course.startdate);
            var availableDate01 = formatDate(course.available_date);
            $("#update_course_name01").val(course.name);
            $("#update_course_content01").val(course.course_content);
            $("#update_course_startdate01").val(startDate01);
            $("#update_course_available_date01").val(availableDate01);
            $("#course_id").val(course.id);
            //console.log(document.getElementById('c_course_id').value)


//            // Set up the Select2 control
//            $('.update-course').select2({
//                ajax: {
//                    url: '/instructors'
//                }
//            });

            $('.update-course').select2({
                ajax: {
                    url: "/instructors",
                    processResults: function (data) {
                        // Tranforms the top-level key of the response object from 'items' to 'results'

                        return {
                            results: $.map(data, function (item) {
                                console.log(item['user']['first_name']);
                                return {
                                    text: item.user.first_name + ' ' + item.user.last_name,
                                    id: item.id,

                                }
                            })
                        }
                    }
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                }
            });


// Fetch the preselected item, and add to the control
            var studentSelect = $('.update-course');
            $.ajax({
                type: 'GET',
                url: "/instructors/" + course.id
            }).then(function (data) {

                $.map(data, function (item) {

                    console.log(item);

                    // create the option and append to Select2
                    var option = new Option(item.user.first_name + ' ' + item.user.last_name, item['id'], true, true);
                    studentSelect.append(option).trigger('change');

                    // manually trigger the `select2:select` event
                    studentSelect.trigger({
                        type: 'select2:select',
                        params: {
                            data: item
                        }
                    });


                })


            });


        }

        function deleteCourse(course) {
            var course = course;
            $("#deletecourse_id").val(course.id);
            //console.log(document.getElementById('c_course_id').value)
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


        //        $(document).ready(function() {
        //            console.log($('#select-members').val());
        //        })

        $('#update-course').on('shown.bs.modal', function () {
            var button = $(event.relatedTarget)
            var codigo = button.data('cod')
            var modal = $(this)
            console.log(codigo)
            modal.find('.modal-body #course_id').val(codigo)
        });

    </script>
@endsection
