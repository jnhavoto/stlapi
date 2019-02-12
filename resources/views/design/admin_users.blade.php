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
                    <h3 class="text-themecolor m-b-0 m-t-0">{{ __('strings.Contacts') }}</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('strings.Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('strings.Communications') }}</li>
                    </ol>
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">

                <div class="col-12">


                    <div class="card">
                        <!-- .left-right-aside-column-->
                        <div class="contact-page-aside">
                            <!-- .left-aside-column-->
                            {{--<div class="left-aside">--}}
                                {{--<ul class="list-style-none">--}}
                                    {{--<li class="box-label"><a href="javascript:void(0)">{{ __('strings.AllContacts') }} <span>--}}
                                           {{--{{ count($students)+count($teachers)}} </span></a></li>--}}
                                    {{--<li class="divider"></li>--}}
                                    {{--<li><a href="javascript:void(0)">{{ __('strings.Participants') }} <span>{{ count--}}
                                    {{--($students)--}}
                                    {{--}}</span></a></li>--}}
                                    {{--<li><a href="javascript:void(0)">{{ __('strings.Instructors') }} <span>{{ count--}}
                                    {{--($teachers)--}}
                                    {{--}}</span></a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                            <!-- /.left-aside-column-->
                            {{--<div class="right-aside">--}}
                            <div class="pl-4">

                                <div class="right-page-header">
                                    <div class="d-flex">
                                        <div class="align-self-center">
                                            <h4 class="card-title m-t-10">{{ __('strings.ContactsList') }} </h4></div>
                                        <div class="ml-auto">
                                            <input type="text" id="demo-input-search2" placeholder="{{ __('strings.searchcontacts') }}search contacts" class="form-control"> </div>
                                    </div>
                                </div>
                                <div>
                                    <td colspan="2">
                                        <a  class="btn btn-info btn-rounded"
                                            href="/add_user"
                                        >
                                            {{ __('strings.AddUser') }}
                                        </a>
                                    </td>
                                    <td colspan="2">
                                        <a  class="btn btn-info btn-rounded"
                                            href="/upload_users"
                                        >
                                            {{ __('strings.UploadUsers') }}
                                            {{--Cancel--}}
                                        </a>
                                    </td>
                                </div>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list
                                    table-striped color-table info-table"
                                           data-page-size="10">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>{{ __('strings.Name') }}</th>
                                            <th>{{ __('strings.Email') }}</th>
                                            <th>{{ __('strings.Phone') }}</th>
                                            <th>{{ __('strings.Role') }}</th>
                                            <th>{{ __('strings.Actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{--Listing all users in the database--}}
                                        @foreach ($users as $user)
                                            <tr>
                                                {{--<td>{{$student->id}}</td>--}}
                                                <td>  {{ $loop->index + 1 }}</td>
                                                <td>
                                                    <a href="/user-details/{{$user->id}}">
                                                        {{--<img src="{{asset ("theme/images/users/1.jpg")}} " alt="user" class="img-circle" />--}}
                                                        {{$user->first_name.' '.$user->last_name}}
                                                    </a>
                                                </td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->telephone}}</td>
                                                <td>{{$user->user_type->name}}
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-circle
                                                     btn-lg m-r-5"><i class="ti-key"></i></button>

                                                    <a href="{{ url('/update-user/'.$user->id)}}" class="btn btn-info
                                                     btn-circle btn-lg">
                                                        <i text-md-center class="ti-pencil-alt"></i>
                                                    </a>
                                                    {{--<a href="{{ url('/delete_user/'.$user->id)}}" class="btn btn-info--}}
                                                     {{--btn-circle btn-lg">--}}
                                                        {{--<i text-md-center class="ti-trash"></i>--}}
                                                    {{--</a>--}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <div class="panel-heading" style="display:flex; justify-content:center;align-items:center;">
                                            {{$users->links()}}
                                        </div>


                                    </table>
                                </div>
                                <div>
                                    <td colspan="2">
                                        <a  class="btn btn-info btn-rounded"
                                            href="/add_user"
                                        >
                                            {{ __('strings.AddUser') }}
                                        </a>
                                    </td>
                                    <td colspan="2">
                                        <a  class="btn btn-info btn-rounded"
                                            href="/upload_users"
                                        >
                                            {{ __('strings.UploadUsers') }}
                                            {{--Cancel--}}
                                        </a>
                                    </td>
                                </div>
                                <!-- .left-aside-column-->
                            {{--</div>--}}

                            <!-- /.left-right-aside-column-->
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
