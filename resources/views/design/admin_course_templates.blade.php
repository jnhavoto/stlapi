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
                    <h3 class="text-themecolor m-b-0 m-t-0"> {{ __('strings.CourseDesign') }}
                    </h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/"> {{ __('strings.Home') }} </a>
                        </li>
                        <li class="breadcrumb-item active"> {{ __('strings.Design') }} </li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page: Course Templates -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
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
                                            <input type="text" id="demo-input-search2"
                                                   placeholder="{{ __('strings.SearchCourses') }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow"
                                           class="table m-t-30 table-hover no-wrap contact-list
                                    table-striped color-table muted-table"
                                           data-page-size="10">
                                        <thead>
                                        <tr>
                                            <th> {{ __('strings.No') }} </th>
                                            <th>{{ __('strings.CourseName') }} </th>
                                            <th>{{ __('strings.CourseDescription') }} </th>
                                            <th>{{ __('strings.Action') }} </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($courseTemplates as $course)
                                            <tr>
                                                <td> {{ $loop->index + 1 }}</td>
                                                <td> {{$course->name}}  </td>
                                                <td>{{substr($course->course_content, 0, 45) }}</td>
                                                <td>
                                                    <a href="{{ url('/update-coursetemplate-form/'.$course->id)}}" class="btn btn-info
                                                     btn-circle btn-lg">
                                                        <i text-md-center class="ti-pencil-alt"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-info btn-circle
                                                    btn-lg"
                                                            href="/"
                                                            data-toggle="modal"
                                                            data-target="#confirm-delete-assignment"
                                                            onclick="deteleAssignment({{$user}})">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-info btn-rounded"
                           href="/coursetemplate-form">
                            {{ __('strings.AddTemplate') }}
                        </a>
                        {{--<button type="button" onclick="courseCleanDetails()" class="btn--}}
                        {{--btn-info btn-rounded"--}}
                        {{--data-toggle="modal" data-target="#create-course">--}}
                        {{--{{ __('strings.AddNewCourse') }}--}}
                        {{--</button>--}}
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{--<!--Modal for copping a course-->--}}
    {{--@include('design.modals.create-course')--}}
    {{--@include('design.modals.update-course')--}}
    {{--@include('design.modals.confirm-delete-course')--}}

    <script>

        function copyCourse(course) {
            var course = course;
            var startDate01 = formatDate(course.startdate);
            $("#name").html(course.name);
            $("#course_content").html(course.course_content);
            $("#c_course_name").val(course.name);
            $("#c_course_content").val(course.course_content);
            $("#c_course_id").val(course.id);
            console.log(course)
        }

        function confirmSubmit(course) {
            $("#name").html(course.name);
            $("#course_content").html(course.course_content);
            $("#startdate").html(startdate);
            $("#available_date").html(available_date);
            $("#instructors").html(instructors);
            $("#c_course_id").val(course.id);
            console.log(startdate);
        }

        function courseCleanDetails() {
            $("#name").html("");
            $("#course_content").html("");
            $("#c_course_name").val("");
            $("#c_course_content").val("");
            $("#c_course_id").val("");
        }


        //update a course
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

        function selectedIntructors() {

            $('.courseInstrutors').val("");

            $('.courseInstrutors').select2({
                ajax: {
                    url: "/instructors",
                    processResults: function (data) {
                        // Transforms the top-level key of the response object from 'items' to 'results'
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
                }
            });

// Fetch the preselected item, and add to the control
            var studentSelect = $('.courseInstrutors');
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

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return [year, month, day].join('-');
        }

        (function () {
            $('#update-course').on('shown.bs.modal', function () {
                var button = $(event.relatedTarget)
                var codigo = button.data('cod')
                var modal = $(this)
                console.log(codigo)
                modal.find('.modal-body #course_id').val(codigo)
            });
        });

    </script>
@endsection
