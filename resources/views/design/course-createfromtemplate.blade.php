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
                            <h4 class="card-title">{{ __('strings.CreateNewCourse') }} </h4>
                            <h6 class="card-subtitle">{{ __('strings.UpdateField') }}
                            </h6>
                            <form id="form-course" class="form-horizontal m-t-40" method="post"
                                  action="/course-createfromtemplate"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" id="course_id" name="course_id" value="0"/>

                                <div class="col-md-6 m-b-20">
                                    <label>{{ __('strings.CourseName') }}</label>
                                    <input name="name" type="text" class="form-control form-control-line"
                                           value="{{ $courseTemplate->name }}">
                                </div>
                                <div class="col-md-6 m-b-20">
                                    <label class="control-label">{{ __('strings.CourseDescription') }}</label>
                                    <textarea name="course_content" class="form-control" rows="5"> {{ $courseTemplate->course_content
                                    }}</textarea>
                                </div>
                                <div class="col-md-4 m-b-20">
                                    <label class="control-label">{{ __('strings.StartDate') }}</label>
                                    <input name="startdate" type="text"
                                           class="form-control" >
                                </div>
                                <div class="col-md-4 m-b-20">
                                    <label class="control-label">{{ __('strings.AvailableDate') }}</label>
                                    <input name="availabledate" type="text"
                                           class="form-control" >
                                </div>

                                {{--<div class="col-md-4 m-b-20">--}}
                                    {{--<h4 class="card-title">{{ __('strings.SelectCourse') }} </h4>--}}
                                    {{--<select class="js-example-basic-multiple" name="course_id" style="width: 100%">--}}
                                        {{--@foreach($teacherCourses as $course)--}}
                                            {{--<option--}}
                                                    {{--name="selectTag"--}}
                                                    {{--value="{{$course->course->id}}">{{$course->course->name}}--}}
                                            {{--</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}

                                <div class="col-md-12 m-b-20">
                                    <label class="control-label">
                                        {{ __('strings.Instructors') }}
                                        {{--Select Instructor(s)--}}
                                    </label>
                                    <select class="select-courses" name="instructors[]" multiple="multiple"
                                            style="width: 100%">
                                        @foreach($instructors as  $teacher)
                                            @if($teacher->id == \Illuminate\Support\Facades\Auth::user()->teacher->id)
                                                <option name="selectTag" value="{{$teacher->id}}" selected="selected">
                                                    {{$teacher->user->first_name}}
                                                    {{$teacher->user->last_name}}
                                                </option>
                                            @else
                                                <option
                                                        name="selectTag"
                                                        value="{{$teacher->id}}">{{$teacher->user->first_name}}
                                                    {{$teacher->user->last_name}}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                                <div class="col-md-12 m-b-20">
                                    <label class="card-title"> {{ __('strings.Material') }}  </label>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <form id="file-input" class="dropzone">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                                <hr>
                                <div class="form-group" align-items-center>
                                    <button id="submit-course" type="submit" class="btn btn-success
                                    btn-rounded"> {{ __('strings.Submit') }} </button>
                                    <a class="btn btn-default btn-rounded waves-effect btn-close"
                                       href="{{ url()->previous()}}"> {{ __('strings.Cancel') }}
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('design.modals.addmaterials')

    <script>

        {{--function selectedCourseID(course) {--}}
{{--//            $("#c_course_content").val(course.id);--}}
            {{--return course;--}}
        {{--}--}}

        {{--function uploadfile() {--}}
            {{----}}
        {{--}--}}
        {{--$(document).ready(function(){--}}

            {{--var course_id = selectedCourseID({{$course->id}});--}}
            {{--console.log(course_id);--}}
            {{--$('.courseInstrutors').val("");--}}

            {{--$('.courseInstrutors').select2({--}}
                {{--ajax: {--}}
                    {{--url: "/instructors",--}}
                    {{--processResults: function (data) {--}}
                        {{--// Transforms the top-level key of the response object from 'items' to 'results'--}}
                        {{--return {--}}
                            {{--results: $.map(data, function (item) {--}}
{{--//                                console.log(item['user']['first_name']);--}}
                                {{--return {--}}
                                    {{--text: item.user.first_name + ' ' + item.user.last_name,--}}
                                    {{--id: item.id,--}}
                                {{--}--}}
                            {{--})--}}
                        {{--}--}}
                    {{--}--}}
                {{--}--}}
            {{--});--}}

{{--// Fetch the preselected item, and add to the control--}}
            {{--var studentSelect = $('.courseInstrutors');--}}
            {{--$.ajax({--}}
                {{--type: 'GET',--}}
                {{--url: "/instructors/" + course_id--}}
             {{--}).then(function (data) {--}}
                {{--$.map(data, function (item) {--}}
                    {{--console.log(item);--}}
                    {{--// create the option and append to Select2--}}
                    {{--var option = new Option(item.user.first_name + ' ' + item.user.last_name, item['id'], true, true);--}}
                    {{--studentSelect.append(option).trigger('change');--}}

                    {{--// manually trigger the `select2:select` event--}}
                    {{--studentSelect.trigger({--}}
                        {{--type: 'select2:select',--}}
                        {{--params: {--}}
                            {{--data: item--}}
                        {{--}--}}
                    {{--});--}}
                {{--})--}}
            {{--});--}}

        {{--});--}}
    </script>
@endsection