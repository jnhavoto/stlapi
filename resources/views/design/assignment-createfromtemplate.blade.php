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
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">{{ __('strings.CreateAssignment') }}</h4>
                        </div>
                        <div class="card-body">
                            <h6 class="card-subtitle">{{ __('strings.UpdateField') }} </h6>
                            <form id="form-assignment" class="form-horizontal m-t-40"
                                  method="post"
                                  action="/create_assignmentFromTemplate"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" id="submitNow" name="submitNow" value="0"/>
                                <div class="form-body">
                                    <div class="col-md-6 m-b-20">
                                        <label>{{ __('strings.AssignmentName') }}</label>
                                        <input name="case" type="text" class="form-control form-control-line"
                                               value="{{ $assignment->case }}">
                                    </div>
                                    <div class="col-md-6 m-b-20">
                                        <label class="control-label">{{ __('strings.AssignmentNumber') }}</label>
                                        <input name="number" type="text" class="form-control form-control-line" value="{{
                                        $assignment->number }}">
                                    </div>
                                    <div class="col-md-6 m-b-20">
                                        <label>{{ __('strings.Instructions') }}</label>
                                        <textarea name="instructions" class="form-control" rows="5"> {{
                                        $assignment->instructions
                                        }}</textarea>
                                    </div>
                                    <div class="col-md-4 m-b-20">
                                        <label class="control-label">{{ __('strings.StartDate') }}</label>
                                        <input name="startdate" type="text"
                                               class="form-control" placeholder="YYYY-MM-DD">
                                    </div>

                                    <div class="col-md-4 m-b-20">
                                        <label class="control-label">{{ __('strings.EndDate') }}</label>
                                        <input name="deadline"
                                               type="text" class="form-control" placeholder="YYYY-MM-DD">
                                    </div>

                                    <div class="col-md-4 m-b-20">
                                        <label class="control-label">{{ __('strings.AvailableDate') }}</label>
                                        <input name="availabledate" type="text"
                                               class="form-control" placeholder="YYYY-MM-DD">
                                    </div>

                                    <div class="col-md-4 m-b-20">
                                        <h4 class="card-title">{{ __('strings.SelectCourse') }} </h4>
                                        <select class="js-example-basic-multiple" name="course_id" style="width: 100%">
                                            @foreach($teacherCourses as $course)
                                                <option
                                                        name="selectTag"
                                                        value="{{$course->course->id}}">{{$course->course->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{--<div class="col-md-12 m-b-20">--}}
                                        {{--<label class="control-label">--}}
                                            {{--{{ __('strings.Instructors') }}--}}
                                            {{--Select Instructor(s)--}}
                                        {{--</label>--}}
                                        {{--<select class="select-courses" name="instructors[]" multiple="multiple"--}}
                                                {{--style="width: 100%">--}}
                                            {{--@foreach($courseInstructors as  $teacher)--}}
                                                {{--@if($teacher->id == \Illuminate\Support\Facades\Auth::user()->teacher->id)--}}
                                                    {{--<option name="selectTag" value="{{$teacher->id}}" selected="selected">--}}
                                                        {{--{{$teacher->user->first_name}}--}}
                                                        {{--{{$teacher->user->last_name}}--}}
                                                    {{--</option>--}}
                                                {{--@else--}}
                                                    {{--<option  name="selectTag" selected="selected"--}}
                                                            {{--value="{{$teacher->id}}">{{$teacher->user->first_name}}--}}
                                                        {{--{{$teacher->user->last_name}}--}}
                                                    {{--</option>--}}
                                                {{--@endif--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                </div>

                            </form>
                            <div class="col-md-12 m-b-20">
                                <h4 class="card-title"> {{ __('strings.Material') }}  </h4>
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

                            <div class="form-group" align-items-center>
                                <button id="submit-assignment" type="submit" class="btn btn-success btn-rounded">
                                    {{ __('strings.Save') }} </button>
                                <a class="btn btn-danger btn-rounded waves-effect btn-close"
                                   href="{{ url()->previous()}}"> {{ __('strings.Cancel') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('dropzones')

    <script type="text/javascript" src="{{ asset('js/assignment-dropzone.js')}}"></script>

@endsection