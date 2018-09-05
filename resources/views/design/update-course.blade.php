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
                        {{--Assignments--}}
                    </h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('strings.UpdateCourse') }} </h4>
                            <h6 class="card-subtitle">{{ __('strings.UpdateField') }}
                            </h6>
                            <form class="form-horizontal m-t-40" method="post" action="{{ route('update_Course', ['id'=>$course->id]) }}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" id="course_id" name="course_id" value="{{$course->id}}"/>

                                <div class="col-md-6 m-b-20">
                                    <label>{{ __('strings.CourseName') }}</label>
                                    <input name="name" type="text" class="form-control form-control-line"
                                           value="{{ $course->name }}">
                                </div>
                                <div class="col-md-6 m-b-20">
                                    <label class="control-label">{{ __('strings.CourseDescription') }}</label>
                                    <textarea name="course_content" class="form-control" rows="5"> {{ $course->course_content
                                    }}</textarea>
                                </div>
                                <div class="col-md-4 m-b-20">
                                    <label class="control-label">{{ __('strings.StartDate') }}</label>
                                    <input name="startdate" type="date"
                                           class="form-control" value="{{
                                    $course->startdate }}">
                                </div>
                                <div class="col-md-4 m-b-20">
                                    <label class="control-label">{{ __('strings.AvailableDate') }}</label>
                                    <input name="availabledate" type="date"
                                           class="form-control" value="{{
                                    $course->available_date }}">
                                </div>

                                <div class="col-md-6 m-b-20">
                                    <label class="control-label">{{ __('strings.SelectInstructors') }} </label>

                                    <select class="courseInstrutors" name="instructors[]" style="width: 100%"
                                            multiple="multiple"
                                    id="select-members">
                                        {{--@foreach($courseInstructors as  $instructor)--}}
                                            {{--<option--}}
                                                    {{--selected="selected"--}}
                                                    {{--name="selectTag"--}}
                                                    {{--value="{{$instructor->teacher->id}}">--}}
                                                {{--{{$instructor->teacher->user->first_name.' '.--}}
                                                {{--$instructor->teacher->user->last_name}}--}}
                                            {{--</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                                </div>
                                <div class="col-md-12 m-b-20">
                                    <label class="card-title"> {{ __('strings.CourseMaterial') }}  </label>
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput"><i
                                                    class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                    class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file"> <span
                                                    class="fileinput-new">Select material</span> <span
                                                    class="fileinput-exists">Change</span>
                                            {{-- <input type="hidden"> --}}
                                            <input type="file" name="material">
                                        </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                                   data-dismiss="fileinput">Remove
                                        </a>
                                    </div>

                                    {{--<div class="form-group" align-items-center>--}}
                                        {{--<a type="submit" class="btn btn-success btn-rounded"--}}
                                           {{--data-toggle="modal"--}}
                                           {{--data-target="#addcoursematerial"--}}
                                        {{-->--}}
                                            {{--{{ __('strings.AddMaterial') }}--}}
                                        {{--</a>--}}

                                    {{--</div>--}}
                                    <div>
                                        <h3>Material</h3>
                                        @foreach ($materials as $material)
                                            <a href="{{ asset($material->path) }}" 
                                                download="{{ $material->path }}"> Download </a>
                                        @endforeach
                                    </div>

                                </div>
                                <div class="form-group" align-items-center>
                                    <button type="submit" class="btn btn-success btn-rounded"> {{ __('strings.Submit') }} </button>
                                    <a class="btn btn-default btn-rounded waves-effect btn-close"
                                       href="{{ url()->previous()}}"> {{ __('strings.Cancel') }}
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>--}}

    <div id="addcoursematerial" class="modal fade in" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        {{ __('strings.AddCourseMaterial') }}
                        {{--Create New Course--}}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-material"
                          action="/submit_course" method="post">
                        {{csrf_field()}}
                        <input type="hidden" id="c_course_id"  name="c_course_id" value="1">

                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                            <div class="form-control" data-trigger="fileinput"><i
                                        class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                        class="fileinput-filename"></span>
                            </div>
                            <span class="input-group-addon btn btn-default btn-file"> <span
                                        class="fileinput-new">Select material</span>
                                <span class="fileinput-exists">Change</span>
                                {{-- <input type="hidden"> --}}
                                <input type="file" name="material">
                                        </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                                   data-dismiss="fileinput">Remove
                            </a>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-success btn-rounded" onclick="submitCourse(1)"
                                    href="/update_course/"
                                    {{--data-dismiss="modal"--}}
                            >
                                {{ __('strings.Now') }}

                                {{--Cancel--}}
                            </button>
                            <button type="button" class="btn btn-default btn-rounded waves-effect" onclick="submitCourse
                        (0)">
                                {{ __('strings.Later') }}

                                {{--Submit--}}
                            </button>

                        </div>
                        {{--<input class="btn btn-primary " type="submit">--}}
                    </form>
                    {{--=========================================================================--}}
                    {{--============================= //FORM ====================================--}}
                    {{--=========================================================================--}}

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>




    <script>

        function selectedCourseID(course) {
//            $("#c_course_content").val(course.id);
            return course;
        }

        $(document).ready(function(){

            var course_id = selectedCourseID({{$course->id}});
            console.log(course_id);
            $('.courseInstrutors').val("");

            $('.courseInstrutors').select2({
                ajax: {
                    url: "/instructors",
                    processResults: function (data) {
                        // Transforms the top-level key of the response object from 'items' to 'results'
                        return {
                            results: $.map(data, function (item) {
//                                console.log(item['user']['first_name']);
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
                url: "/instructors/" + course_id
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

        });
    </script>
@endsection