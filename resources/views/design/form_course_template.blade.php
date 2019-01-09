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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('strings.CreateNewCourse') }} </h4>
                            <h6 class="card-subtitle">{{ __('strings.UpdateField') }}
                            </h6>
                            <form id="form-course" class="form-horizontal m-t-40" method="post"
                                  action="/create_course_template"
                                  enctype="multipart/form-data" data-toggle="validator" role="form">
                                {{csrf_field()}}
                                <input type="hidden" id="course_id" name="course_id" value="0"/>

                                <div class="col-md-6 m-b-20">
                                    <label>{{ __('strings.CourseName') }}</label>
                                    <input name="name" type="text" class="form-control form-control-line" placeholder="Type here">
                                </div>
                                <div class="col-md-6 m-b-20">
                                    <label class="control-label">{{ __('strings.CourseDescription') }}</label>
                                    <textarea name="course_content" class="form-control form-control-line" rows="5" placeholder="Type here"> </textarea>
                                </div>
                            </form>
                                <div class="form-group" align-items-center>
                                    <button id="submit-courseTemplate" type="submit" class="btn btn-success
                                    btn-rounded"> {{ __('strings.Submit') }} </button>

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

    <script>

    </script>
@endsection

@section('dropzones')

    <script type="text/javascript" src="{{ asset('js/course-dropzone.js')}}"></script>

@endsection