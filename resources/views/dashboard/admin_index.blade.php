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
                    <h3 class="text-themecolor m-b-0 m-t-0">{{ __('strings.Users') }}</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">{{ __('strings.Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('strings.UserDetails') }}</li>
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
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">{{ __('strings.UserList') }}</h4>
                        </div>
                        <!-- .left-right-aside-column-->
                        <div class="contact-page-aside">
                            <div class="pl-4">
                                {{--<div class="right-page-header">--}}
                                {{--<div class="d-flex">--}}
                                {{--<div class="align-self-center">--}}
                                {{--<h4 class="card-title m-t-10">{{ __('strings.ContactsList') }} </h4></div>--}}
                                {{--<div class="ml-auto">--}}
                                {{--<input type="text" id="demo-input-search2" placeholder="{{ __('strings.searchusers') }}" class="form-control"> --}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table m-t-30 table-hover no-wrap contact-list">
                                        <thead>
                                        <tr>
                                            <th> #</th>
                                            <th>{{ __('strings.Name') }} </th>
                                            <th>{{ __('strings.Email') }} </th>
                                            <th>{{ __('strings.Phone') }} </th>
                                            <th>{{ __('strings.Role') }} </th>
                                            <th>{{ __('strings.LastLogin') }} </th>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
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
                                                <td>{{$user->user_type->name}} </td>
                                                <td>
                                                    @if(empty($user->last_login))
                                                        -
                                                    @else
                                                        {{$user->last_login}}
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>

        {{--<script>--}}
            {{--$(document).ready(function () {--}}
                {{--$('#myTable').DataTable();--}}
                {{--$(document).ready(function () {--}}
                    {{--var table = $('#example').DataTable({--}}
                        {{--"columnDefs": [{--}}
                            {{--"visible": false,--}}
                            {{--"targets": 2--}}
                        {{--}],--}}
                        {{--"order": [--}}
                            {{--[2, 'asc']--}}
                        {{--],--}}
                        {{--"displayLength": 25,--}}
                        {{--"drawCallback": function (settings) {--}}
                            {{--var api = this.api();--}}
                            {{--var rows = api.rows({--}}
                                {{--page: 'current'--}}
                            {{--}).nodes();--}}
                            {{--var last = null;--}}
                            {{--api.column(2, {--}}
                                {{--page: 'current'--}}
                            {{--}).data().each(function (group, i) {--}}
                                {{--if (last !== group) {--}}
                                    {{--$(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');--}}
                                    {{--last = group;--}}
                                {{--}--}}
                            {{--});--}}
                        {{--}--}}
                    {{--});--}}
                    {{--// Order by the grouping--}}
                    {{--$('#example tbody').on('click', 'tr.group', function () {--}}
                        {{--var currentOrder = table.order()[0];--}}
                        {{--if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {--}}
                            {{--table.order([2, 'desc']).draw();--}}
                        {{--} else {--}}
                            {{--table.order([2, 'asc']).draw();--}}
                        {{--}--}}
                    {{--});--}}
                {{--});--}}
            {{--});--}}
            {{--// $('#example23').DataTable({--}}
            {{--//     dom: 'Bfrtip',--}}
            {{--//     buttons: [--}}
            {{--//         'copy', 'csv', 'excel', 'pdf', 'print'--}}
            {{--//     ]--}}
            {{--// });--}}
        {{--</script>--}}

@endsection
