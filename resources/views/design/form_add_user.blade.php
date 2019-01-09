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
                        {{ __('strings.AddUser') }}
                        {{--Assignments--}}
                    </h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">
                                {{ __('strings.Home') }}
                                {{--Home--}}
                            </a></li>
                        <li class="breadcrumb-item active">
                            {{ __('strings.User') }}
                            {{--Activities--}}
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('strings.CreateUser') }} </h4>
                            <form id="form-course" class="form-horizontal m-t-40" method="post"
                                  action="/submit_user"
                                  enctype="multipart/form-data" data-toggle="validator" role="form">
                                {{csrf_field()}}
                                <input type="hidden" id="course_id" name="user_id" value="0"/>

                                <div class="col-md-6 m-b-20">
                                    <label>{{ __('strings.FirstName') }}</label>
                                    <input name="first_name" type="text" class="form-control form-control-line"
                                           >
                                </div>
                                <div class="col-md-6 m-b-20">
                                    <label>{{ __('strings.LastName') }}</label>
                                    <input name="last_name" type="text" class="form-control form-control-line">
                                </div>
                                <div class="col-md-6 m-b-20">
                                    <label>{{ __('strings.Telephone') }}</label>
                                    <input name="telephone" type="text" class="form-control form-control-line"
                                    >
                                </div>
                                <div class="col-md-6 m-b-20">
                                    <label class="control-label">{{ __('strings.Email') }}</label>
                                    <input name="email" type="email" class="form-control" rows="5">
                                </div>

                                <div class="col-md-12 m-b-20">
                                    <label class="control-label">
                                        {{ __('strings.Role') }}
                                        {{--Select Instructor(s)--}}
                                    </label>
                                    <select class="js-example-basic-single" name="user_type"
                                            style="width: 100%">
                                        <option value="AL">Administrator</option>
                                        <option value="AL">Instructor</option>
                                        <option value="WY">Student</option>
                                    </select>
                                </div>
                            </form>
                            <div class="form-group" align-items-center>
                                    <button id="submit-course" type="submit" class="btn btn-success
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

    @include('design.modals.addmaterials')

@endsection

@section('dropzones')

    <script type="text/javascript" src="{{ asset('js/course-dropzone.js')}}"></script>

@endsection