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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Course</h4>
                            <h6 class="card-subtitle">You can change the content
                            </h6>
                            <form class="form-horizontal m-t-40">
                                <div class="col-md-6 m-b-20">
                                    <label>Course name</label>
                                    <input type="text" class="form-control form-control-line"
                                           value="{{ $course->name }}">
                                </div>
                                <div class="col-md-6 m-b-20">
                                    <label class="control-label">Course description</label>
                                    <textarea class="form-control" rows="5"> {{ $course->course_content  }}</textarea>
                                </div>
                                <div class="col-md-4 m-b-20">
                                    <label class="control-label">Start date</label>
                                    <input name="startdate" type="date"
                                           class="form-control" value="{{
                                    $course->startdate }}">
                                </div>
                                <div class="col-md-4 m-b-20">
                                    <label class="control-label">Available
                                        date</label>
                                    <input name="availabledate" type="date"
                                           class="form-control" value="{{
                                    $course->available_date }}">
                                </div>

                                <div class="col-md-4 m-b-20">
                                    <h4 class="card-title">Select instructors </h4>
                                </div>
                                <div class="col-md-4 m-b-20">
                                    <select class="courseInstrutors" name="instructors[]" style="width: 100%"
                                            multiple="multiple"
                                    id="select-members">
                                        {{--@foreach($courseInstructors as  $instructor)--}}
                                            {{--<option--}}
                                                    {{--name="selectTag"--}}
                                                    {{--value="{{$instructor->teacher->id}}">--}}
                                                {{--{{$instructor->teacher->user->first_name.' '.--}}
                                                {{--$instructor->teacher->user->last_name}}--}}
                                            {{--</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                                </div>
                                <div class="col-md-12 m-b-20">
                                    <h4 class="card-title"> Assignment Material </h4>
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput"><i
                                                    class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                    class="fileinput-filename"></span></div>
                                        <span class="input-group-addon btn btn-default btn-file"> <span
                                                    class="fileinput-new">Select file</span> <span
                                                    class="fileinput-exists">Change</span>
                                            <input type="hidden">
                                            <input type="file" name="..."> </span> <a href="#"
                                                                                      class="input-group-addon btn btn-default fileinput-exists"
                                                                                      data-dismiss="fileinput">Remove</a>
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
@endsection