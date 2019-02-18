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
                    <h3 class="text-themecolor m-b-0 m-t-0">{{ __('strings.AssignmentFeedbacks') }}</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{ __('strings.Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('strings.AssignmentFeedbacks') }}</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- Start Assignment Course List Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">{{ __('strings.ParticipantFeedbacks') }}</h4>
                        </div>
                        <!-- .left-right-aside-column-->
                        <div class="contact-page-aside">
                            <div class="pl-4">
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table m-t-30 table-hover no-wrap contact-list">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Student id</th>
                                            <th>Assignmet Submission Id</th>
                                            <th>Goal</th>
                                            <th>Message</th>
                                            <th>Advice</th>
                                            <th>Comment</th>
                                            <th>Submission Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($feedbacks as $feedback)
                                            <tr>
                                                {{--<td> {{ $assignment->students_id}}</td>--}}
                                                <td> {{ $loop->index + 1 }}</td>
                                                <td>
                                                    <img src="{{asset ("theme/images/users/1.jpg")}} " alt="user"
                                                         class="img-circle" /> <a href="/contact-details"
                                                                                  onclick="feedbackDetails
                                                                                          ({{$feedback}})">
                                                        {{ $feedback->students_id}}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{--<a href="/assignment_details">--}}
                                                    <a href="/" data-toggle="modal" data-target="#modalsAssDetails"
                                                       onclick="feedbackDetails({{$feedback}})">
                                                        {{$feedback->assignment_submissions_id}}
                                                    </a>
                                                </td>
                                                {{--<td>{{$submission->submission_date}}</td>--}}
                                                <td>
                                                    {{$feedback->goal}}
                                                </td>
                                                <td>
                                                    {{$feedback->message}}
                                                </td>
                                                <td>
                                                    {{$feedback->advice}}
                                                </td>
                                                <td>
                                                    {{$feedback->comment}}
                                                </td>
                                                <td>
                                                    {{$feedback->feedback_date}}
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                        <tfoot>
                                        <td colspan="7">
                                            <div class="text-right">
                                                <ul class="pagination"></ul>
                                            </div>
                                        </td>
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
            <!-- ============================================================== -->
            <!-- End of Assignment - Courst List -->
            <!-- ============================================================== -->
        </div>
    </div>

    <div id="testetetetet">

    </div>


    <script>

        function feedbackDetails($feedback) {
//            var  assignment = assignment;
//            $("#case").html(assignment.case);
//            $("#number").html(assignment.number);
//            $("#instructions").html(assignment.instructions);
//            $("#startdate").html(assignment.startdate);
//            $("#duedate").html(assignment.deadline);
//            $("#availabledate").html(assignment.available_date);
            console.log($feedback);
        }

    </script>


@endsection
