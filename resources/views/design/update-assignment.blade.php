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
                    </h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">
                                {{ __('strings.Home') }}
                            </a></li>
                        <li class="breadcrumb-item active">
                            {{ __('strings.Design') }}
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('strings.UpdateAssignment') }}</h4>
                            <h6 class="card-subtitle">{{ __('strings.UpdateField') }} </h6>
                            <form id="form-assignment" class="form-horizontal m-t-40"
                                  action="/update_assignment"
                                  method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" id="assignment_id" name="assignment_id" value="{{$assignment->id}}"/>
                                <input type="hidden" id="course_id" name="course_id" value="{{$assignment->courses_id}}"/>
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
                                           class="form-control" value="{{
                                    $assignment->startdate }}">
                                </div>

                                <div class="col-md-4 m-b-20">
                                    <label class="control-label">{{ __('strings.EndDate') }}</label>
                                    <input name="deadline"
                                           type="text" class="form-control" value="{{
                                    $assignment->deadline }}">
                                </div>

                                <div class="col-md-4 m-b-20">
                                    <label class="control-label">{{ __('strings.AvailableDate') }}</label>
                                    <input name="availabledate" type="text"
                                           class="form-control" value="{{
                                    $assignment->available_date }}">
                                </div>

                                <div class="col-md-4 m-b-20">
                                    <h4 class="card-title">{{ __('strings.SelectCourse') }} </h4>
                                </div>
                                <div class="col-md-4 m-b-20">
                                    <select class="js-example-basic-multiple" name="course_id" style="width: 100%">
                                        @foreach($teacherCourses as  $course)
                                            @if($course->course->id == $assignment->courses_id)
                                                <option name="selectTag" value="{{$assignment->courses_id}}" selected="selected">
                                                    {{$course->course->name}}
                                                </option>
                                            @endif
                                            <option
                                                    name="selectTag"
                                                    value="{{$course->course->id}}">{{$course->course->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12 m-b-20">
                                    <label class="control-label"> {{ __('strings.Instructors') }} </label>
                                    <select class="select-courses" name="instructors[]" multiple="multiple"
                                            style="width: 100%">
                                        @foreach($instructors as  $teacher)
                                            @foreach($currentInstructors as $currentInstructor)
                                                @if($teacher->id == $currentInstructor->teachers_id)
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
                                        @endforeach
                                    </select>
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
                                <button id="submit-updateassignment" type="submit"
                                        class="btn btn-success btn-rounded">
                                        {{ __('strings.Save') }}
                                </button>
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
@endsection

@section('dropzones')

    <script type="text/javascript" src="{{ asset('js/assignment-update.js')}}"></script>

@endsection