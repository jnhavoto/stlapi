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
                    <h3 class="text-themecolor m-b-0 m-t-0">Assignments</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Activities</li>
                    </ol>
                </div>
                <div class="col-md-7 col-4 align-self-center">
                    <div class="d-flex m-t-10 justify-content-end">
                        <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                            <div class="chart-text m-r-10">
                                <h6 class="m-b-0">
                                    <small>THIS MONTH</small>
                                </h6>
                                <h4 class="m-t-0 text-info">$58,356</h4></div>
                            <div class="spark-chart">
                                <div id="monthchart"></div>
                            </div>
                        </div>
                        <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                            <div class="chart-text m-r-10">
                                <h6 class="m-b-0">
                                    <small>LAST MONTH</small>
                                </h6>
                                <h4 class="m-t-0 text-primary">$48,356</h4></div>
                            <div class="spark-chart">
                                <div id="lastmonthchart"></div>
                            </div>
                        </div>
                        <div class="">
                            <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10">
                                <i class="ti-settings text-white"></i></button>
                        </div>
                    </div>
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
                        {{--<li class="box-label"><a href="javascript:void(0)">All Assignments <span>--}}
                        {{--{{ count($assignments)}} </span></a></li>--}}
                        {{--<li class="divider"></li>--}}
                        {{--<li><a href="javascript:void(0)">Courses <span>{{ count($courses)--}}
                        {{--}}</span></a></li>--}}

                        {{--<li><a href="javascript:void(0)">Friends <span>623</span></a></li>--}}
                        {{--<li><a href="javascript:void(0)">Private <span>53</span></a></li>--}}
                        {{--<li class="box-label"><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">+ Create New Label</a></li>--}}
                        {{--<div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
                        {{--<div class="modal-dialog">--}}
                        {{--<div class="modal-content">--}}
                        {{--<div class="modal-header">--}}
                        {{--<div class="d-flex no-block align-items-center">--}}
                        {{--<h4 class="modal-title" id="myModalLabel">Add Lable</h4>--}}
                        {{--<div class="ml-auto">--}}
                        {{--<button type="button" class="close float-right" data-dismiss="modal" aria-hidden="true">×</button>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="modal-body">--}}
                        {{--<from class="form-horizontal">--}}
                        {{--<div class="form-group">--}}
                        {{--<label class="col-md-12">Name of Label</label>--}}
                        {{--<div class="col-md-12">--}}
                        {{--<input type="text" class="form-control" placeholder="type name"> </div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                        {{--<label class="col-md-12">Select Number of people</label>--}}
                        {{--<div class="col-md-12">--}}
                        {{--<select class="form-control">--}}
                        {{--<option>All Contacts</option>--}}
                        {{--<option>10</option>--}}
                        {{--<option>20</option>--}}
                        {{--<option>30</option>--}}
                        {{--<option>40</option>--}}
                        {{--<option>Custome</option>--}}
                        {{--</select>--}}
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
                        {{--</ul>--}}
                        {{--</div>--}}
                        <!-- /.left-aside-column-->
                            <div class="right-aside">
                                <div class="right-page-header">
                                    <div class="d-flex">
                                        <div class="align-self-center">
                                            <h4 class="card-title m-t-10">Assignment List </h4></div>
                                        <div class="ml-auto">
                                            <input type="text" id="demo-input-search2" placeholder="search contacts"
                                                   class="form-control"></div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list"
                                           data-page-size="10">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Case</th>
                                            <th>Instructions</th>
                                            <th>Date of Start</th>
                                            <th>Due Date</th>
                                            <th>Available from</th>
                                            {{--<th>Joining date</th>--}}
                                            {{--<th>Salery</th>--}}
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($assignments as $assignment)
                                            <tr>
                                                {{--<td>{{$student->id}}</td>--}}
                                                <td> {{ $assignment->id }}</td>
                                                <td>
                                                    <a href="/" data-toggle="modal" data-target="#modalsAssDetails">
                                                        {{--<img src="{{asset ("theme/images/users/1.jpg")}} " alt="user" class="img-circle" />--}}
                                                        {{$assignment->case}}
                                                    </a>
                                                </td>
                                                <td>{{substr($assignment->instructions, 0, 45) }}</td>
                                                <td>{{$assignment->startdate}}</td>
                                                <td>{{$assignment->deadline}}</td>
                                                <td>{{$assignment->available_date}}</td>
                                                <td>
                                                    <button type="button"
                                                            class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn"
                                                            data-toggle="tooltip" data-original-title="Delete"><i
                                                                class="ti-close" aria-hidden="true"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <button type="button" class="btn btn-info btn-rounded"
                                                        data-toggle="modal" data-target="#add-contact">Add New
                                                    Assignment
                                                </button>
                                            </td>


                                            <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog"
                                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Add New
                                                                Assignment</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            {{--=========================================================================--}}
                                                            {{--============================= FORM  ====================================--}}
                                                            {{--=========================================================================--}}
                                                            <form class="form-horizontal form-material"
                                                                  action="/submit_assignment" method="post">

                                                                {{csrf_field()}}

                                                                <div class="form-group">

                                                                    <div class="col-md-12 m-b-20">
                                                                        <input name="case" type="text"
                                                                               class="form-control"
                                                                               placeholder="Type case name">
                                                                    </div>

                                                                    <div class="col-md-12 m-b-20">
                                                                        <input name="instructions" type="textarea"
                                                                               class="form-control" rows="3"
                                                                               placeholder="Instrutions">
                                                                    </div>

                                                                    <div class="col-md-12 m-b-20">
                                                                        <input name="startdate" type="date"
                                                                               class="form-control"
                                                                               placeholder="Start date">
                                                                    </div>

                                                                    <div class="col-md-12 m-b-20">
                                                                        <input name="deadline"
                                                                               type="date" class="form-control"
                                                                               placeholder="Due date">
                                                                    </div>

                                                                    <div class="col-md-12 m-b-20">

                                                                        <input name="availabledate" type="date"
                                                                               class="form-control"
                                                                               placeholder="Available date">

                                                                    </div>

                                                                </div>
                                                                <input class="btn btn-primary" type="submit">
                                                            </form>
                                                            {{--=========================================================================--}}
                                                            {{--============================= //FORM ====================================--}}
                                                            {{--=========================================================================--}}
                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-default waves-effect"
                                                                    data-dismiss="modal">Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <td colspan="7">
                                                <div class="text-right">
                                                    <ul class="pagination"></ul>
                                                </div>
                                            </td>
                                        </tr>
                                        </tfoot>
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

    <div id="testetetetet">

    </div>

    @include('activities.modals.assignment-details')



    <script>

//        alert('Hello World'+$('#testetetetet'));

    </script>


@endsection
