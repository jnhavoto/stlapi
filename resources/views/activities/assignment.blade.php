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

                            <div class="pl-4">
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
                                                <td> {{ $loop->index + 1 }}</td>
                                                <td>
                                                    {{--<a href="/assignment_details">--}}
                                                    <a href="/" data-toggle="modal" data-target="#modalsAssDetails"
                                                       onclick="assignDetails({{$assignment}})">
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
                                                                        <label class="control-label">Case name</label>
                                                                        <input name="case" type="text"
                                                                               class="form-control">
                                                                    </div>

                                                                    <div class="col-md-12 m-b-20">
                                                                        <label
                                                                                class="control-label">Instructions</label>
                                                                        <input name="instructions" type="textarea"
                                                                               class="form-control" rows="3">
                                                                    </div>

                                                                    <div class="col-md-12 m-b-20">
                                                                        <label class="control-label">Start date</label>
                                                                        <input name="startdate" type="date"
                                                                               class="form-control">
                                                                    </div>

                                                                    <div class="col-md-12 m-b-20">
                                                                        <label class="control-label">Due date</label>
                                                                        <input name="deadline"
                                                                               type="date" class="form-control">
                                                                    </div>

                                                                    <div class="col-md-12 m-b-20">
                                                                        <label class="control-label">Available
                                                                            date</label>
                                                                        <input name="availabledate" type="date"
                                                                               class="form-control">

                                                                    </div>

                                                                </div>
                                                                {{--<input class="btn btn-primary" type="submit">--}}
                                                                <div class="form-group">
                                                                    <div>
                                                                        <button type="submit" class="btn
                                                                        btn-success btn-block">Submit</button>
                                                                        <button type="button" class="btn btn-default
                                                                        btn-block waves-effect"
                                                                                data-dismiss="modal">Cancel
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            {{--=========================================================================--}}
                                                            {{--============================= //FORM ====================================--}}
                                                            {{--=========================================================================--}}
                                                        </div>
                                                        {{--<div class="modal-footer">--}}

                                                            {{--<button type="button" class="btn btn-default waves-effect"--}}
                                                                    {{--data-dismiss="modal">Cancel--}}
                                                            {{--</button>--}}
                                                        {{--</div>--}}
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

        function assignDetails(assignment) {
          var  assignment = assignment;

            $("#case").html(assignment.case);
            $("#instructions").html(assignment.instructions);
            $("#startdate").html(assignment.startdate);
            $("#duedate").html(assignment.deadline);
            console.log(assignment);
        }

    </script>


@endsection
