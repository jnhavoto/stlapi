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
                            <div class="left-aside">
                                <ul class="list-style-none">
                                    <li class="box-label"><a href="javascript:void(0)">{{ __('strings.AllContacts') }} <span>
                                           {{ count($students)+count($teachers)}} </span></a></li>
                                    <li class="divider"></li>
                                    <li><a href="javascript:void(0)">{{ __('strings.Participants') }} <span>{{ count
                                    ($students)
                                    }}</span></a></li>
                                    <li><a href="javascript:void(0)">{{ __('strings.Instructors') }} <span>{{ count
                                    ($teachers)
                                    }}</span></a></li>
                                </ul>
                            </div>
                            <!-- /.left-aside-column-->
                            <div class="right-aside">
                                <div class="right-page-header">
                                    <div class="d-flex">
                                        <div class="align-self-center">
                                            <h4 class="card-title m-t-10">{{ __('strings.ContactsList') }} </h4></div>
                                        <div class="ml-auto">
                                            <input type="text" id="demo-input-search2" placeholder="{{ __('strings.searchcontacts') }}search contacts" class="form-control"> </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>{{ __('strings.Name') }}</th>
                                            <th>{{ __('strings.Email') }}</th>
                                            <th>{{ __('strings.Phone') }}</th>
                                            <th>{{ __('strings.Role') }}</th>
                                            {{--<th>Age</th>--}}
                                            <th>{{ __('strings.Joiningdate') }}</th>
                                            {{--<th>Salery</th>--}}
                                            <th>{{ __('strings.Action') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($students as $student)
                                            <tr>
                                                {{--<td>{{$student->id}}</td>--}}
                                                <td> {{ $loop->index + 1 }}</td>
                                                <td>
                                                    <a href="/contact-details"><img src="{{asset
                                                    ("theme/images/users/1.jpg")}}
                                                    " alt="user" class="img-circle" />
                                                        {{$student->user->first_name.' '.$student->user->last_name}}
                                                    </a>
                                                </td>
                                                <td>{{$student->user->email}}</td>
                                                <td>{{$student->user->telephone}}</td>
                                                <td><span class="label label-info">Student</span> </td>
                                                {{--<td>23</td>--}}
                                                <td>{{$student->user->created_at}}</td>
                                                {{--<td>$1200</td>--}}
                                                <td>
                                                    <a href="{{ url('/update-student/'
                                                    .$student->id)}}" class="btn btn-info
                                                     btn-circle btn-lg">
                                                        <i text-md-center class="ti-pencil-alt"></i>
                                                    </a>

                                                    {{--<button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>--}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        @foreach ($teachers as $teacher)
                                            <tr>
                                                <td>{{ $loop->index + count($students)+1}}</td>
                                                <td>
                                                    <a href="/contact-details"><img src="{{asset
                                                    ("theme/images/users/1.jpg")}}
                                                                " alt="user" class="img-circle" />
                                                        {{$teacher->user->first_name.' '.$teacher->user->last_name}}
                                                    </a>
                                                </td>
                                                <td>{{$teacher->user->email}}</td>
                                                <td>{{$teacher->user->telephone}}</td>
                                                <td><span class="label label-success">Instructor</span> </td>
                                                {{--<td>23</td>--}}
                                                <td>{{$teacher->user->created_at}}</td>
                                                {{--<td>$1200</td>--}}
                                                <td>
                                                    <a href="{{ url('/update-teacher/'
                                                    .$teacher->id)}}" class="btn btn-info
                                                     btn-circle btn-lg">
                                                        <i text-md-center class="ti-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        {{--<tfoot>--}}
                                        {{--<tr>--}}
                                            {{--<td colspan="2">--}}
                                                {{--<button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-contact">Add New Contact</button>--}}
                                            {{--</td>--}}
                                            {{--<div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
                                                {{--<div class="modal-dialog">--}}
                                                    {{--<div class="modal-content">--}}
                                                        {{--<div class="modal-header">--}}
                                                            {{--<h4 class="modal-title" id="myModalLabel">Add New Contact</h4>--}}
                                                            {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="modal-body">--}}
                                                            {{--<from class="form-horizontal form-material">--}}
                                                                {{--<div class="form-group">--}}
                                                                    {{--<div class="col-md-12 m-b-20">--}}
                                                                        {{--<input type="text" class="form-control" placeholder="Type name"> </div>--}}
                                                                    {{--<div class="col-md-12 m-b-20">--}}
                                                                        {{--<input type="text" class="form-control" placeholder="Email"> </div>--}}
                                                                    {{--<div class="col-md-12 m-b-20">--}}
                                                                        {{--<input type="text" class="form-control" placeholder="Phone"> </div>--}}
                                                                    {{--<div class="col-md-12 m-b-20">--}}
                                                                        {{--<input type="text" class="form-control" placeholder="Designation"> </div>--}}
                                                                    {{--<div class="col-md-12 m-b-20">--}}
                                                                        {{--<input type="text" class="form-control" placeholder="Age"> </div>--}}
                                                                    {{--<div class="col-md-12 m-b-20">--}}
                                                                        {{--<input type="text" class="form-control" placeholder="Date of joining"> </div>--}}
                                                                    {{--<div class="col-md-12 m-b-20">--}}
                                                                        {{--<input type="text" class="form-control" placeholder="Salary"> </div>--}}
                                                                    {{--<div class="col-md-12 m-b-20">--}}
                                                                        {{--<div class="fileupload btn btn-danger btn-rounded waves-effect waves-light"><span><i class="ion-upload m-r-5"></i>Upload Contact Image</span>--}}
                                                                            {{--<input type="file" class="upload"> </div>--}}
                                                                    {{--</div>--}}
                                                                {{--</div>--}}
                                                            {{--</from>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="modal-footer">--}}
                                                            {{--<button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Save</button>--}}
                                                            {{--<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<!-- /.modal-content -->--}}
                                                {{--</div>--}}
                                                {{--<!-- /.modal-dialog -->--}}
                                            {{--</div>--}}
                                            {{--<td colspan="7">--}}
                                                {{--<div class="text-right">--}}
                                                    {{--<ul class="pagination"> </ul>--}}
                                                {{--</div>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--</tfoot>--}}
                                    </table>
                                </div>
                                <!-- .left-aside-column-->
                            </div>
                            <!-- /.left-right-aside-column-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
