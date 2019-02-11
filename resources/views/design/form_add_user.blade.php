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
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">{{ __('strings.AddUser') }}</h4>
                        </div>
                        <div class="card-body">
                            <form id="form-course"
                                  method="post"
                                  action="/create_user"
                                  enctype="multipart/form-data" data-toggle="validator" role="form">
                                {{csrf_field()}}
                                <input type="hidden" id="course_id" name="user_id" value="0"/>
                                <div class="form-body">
                                    <h3 class="card-title">{{ __('strings.UserInfo') }}</h3>
                                    <hr>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">{{ __('strings.FirstName') }}</label>
                                                <input type="text" name="first_name" id="firstName"
                                                       class="form-control">
                                                <small class="form-control-feedback"> Write user first name</small>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">{{ __('strings.LastName') }}</label>
                                                <input type="text" name="last_name" id="last_name" class="form-control">
                                                <small class="form-control-feedback"> Write user last name</small>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>

                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">{{ __('strings.Telephone') }}</label>
                                                <input type="text" name="telephone" id="telephone"
                                                       class="form-control">
                                                <small class="form-control-feedback"> Write user telephone number
                                                </small>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label"> {{ __('strings.Role') }} </label>
                                            <select class="js-example-basic-multiple" name="user_types_id"
                                                    style="width: 100%">
                                                @foreach($usertypes as $user_type)
                                                    <option
                                                            name="selectTag"
                                                            value="{{$user_type->id}}">
                                                        {{$user_type->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">{{ __('strings.Email') }}</label>
                                                <input type="text" name="email" id="enmail" class="form-control">
                                                <small class="form-control-feedback"> Write user email</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">{{ __('strings.Password') }}</label>
                                                <input type="password" name="password" id="password"
                                                       class="form-control">
                                                <small class="form-control-feedback"> Write user password</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <label class="control-label">{{ __('strings.School') }}</label>
                                            <select class="js-example-basic-multiple" name="school_id"
                                                    style="width: 100%">
                                                @foreach($schools as $school)
                                                    <option
                                                            name="selectTag"
                                                            selected="selected"
                                                            value="{{$school->id}}">{{$school->school_name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">{{ __('strings.City') }}</label>
                                            <select class="js-example-basic-multiple" name="city_id"
                                                    style="width: 100%">
                                                @foreach($cities as $city)
                                                    <option
                                                            name="selectTag"
                                                            selected="selected"
                                                            value="{{$city->id}}">{{$city->city_name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="form-group" align-items-center>
                                        <button id="submit-course" type="submit" class="btn btn-success
                                        btn-rounded"> {{ __('strings.Save') }} </button>
                                        <a class="btn btn-danger btn-rounded waves-effect btn-close"
                                           href="{{ url()->previous()}}"> {{ __('strings.Cancel') }}
                                        </a>
                                    </div>
                                </div>
                            </form>
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