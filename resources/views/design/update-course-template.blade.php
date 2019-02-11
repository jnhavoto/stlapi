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
                <div class="col-lg-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">{{ __('strings.CreateNewCourse') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="/update-course-template"
                                  method="post"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" id="ctemplate_id" name="ctemplate_id" value="{{$coursetemplate->id}}"/>
                                <div class="form-body">
                                    <h3 class="card-title">{{ __('strings.UpdateField') }}</h3>
                                    <hr>
                                    <div class="row p-t-20">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">{{ __('strings.CourseName') }}</label>
                                                <input type="text" name="name" id="firstName" class="form-control" value="{{$coursetemplate->name}}">
                                                <small class="form-control-feedback"> Edit the course name </small> </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">{{ __('strings.CourseDescription') }}</label>
                                                <textarea name="course_content" class="form-control" id="exampleTextarea" rows="7" >{{$coursetemplate->course_content}}</textarea>
                                                {{--<input type="textarea" id="firstName" class="form-control" value="{{$coursetemplate->course_content}}">--}}
                                                <small class="form-control-feedback"> Edit the course description </small> </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success btn-rounded"> <i class="fa fa-check"></i> {{ __('strings.Save') }}</button>
                                    <a class="btn btn-danger btn-rounded waves-effect btn-close"
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

    <script>

    </script>
@endsection

@section('dropzones')

    <script type="text/javascript" src="{{ asset('js/course-dropzone.js')}}"></script>

@endsection