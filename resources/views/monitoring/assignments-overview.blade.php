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
                    <h3 class="text-themecolor m-b-0 m-t-0">{{ __('strings.AssignmentsOverview') }}</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">
                                {{ __('strings.Home') }}
                                Home</a></li>
                        <li class="breadcrumb-item active">
                            {{ __('strings.Monitoring') }}
                        </li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Start Assignment List -->
            <!-- ============================================================== -->
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">{{ __('strings.AssignmentSubmissions') }}</h4>
                </div>
                <div class="card-body">
                    <h4 class="card-title"> </h4>
                    <h6 class="card-subtitle">List of assignment submissions per student</h6>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table m-t-30 table-hover no-wrap contact-list">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Assignment Name</th>
                                <th>Participant Name</th>
                                <th>Submission Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($submissions as $submission)
                                @php
                                    $assign = \App\Models\AssignmentDescription::where('id',$submission['assignment_descriptions_id'])->first();
                                    $student = \App\Models\Student::where('id',$submission['students_id'])->first();
                                    $studentDetails = \App\User::where('id',$student['users_id'])->first();
                                @endphp
                                <tr>
{{--                                    <td>Number of items {{$submissions->count() }}</td>--}}
                                    <td>{{ $assign['number'] }}</td>
                                    <td>{{ $assign['case'] }}</td>
                                    <td>
                                        <a href="/submission-details/{{$submission->id}}">
                                            {{ $studentDetails['first_name'].' '.$studentDetails['last_name']}}
                                        </a>

                                    </td>
                                    <td>{{ $submission['submission_date'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Start General Overview -->
            <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap">
                                            <div>
                                                <h3 class="card-title">  {{ __('strings.AssignmentsOverview') }}</h3>
                                                <h6 class="card-subtitle">Finished vs Ongoing</h6> </div>
                                            <div class="ml-auto">
                                                <ul class="list-inline">
                                                    <li>
                                                        <h6 class="text-muted text-success"><i class="fa fa-circle
                                                    font-10 m-r-10 "></i>Finished</h6> </li>
                                                    <li>
                                                        <h6 class="text-muted  text-info"><i class="fa fa-circle font-10
                                                    m-r-10"></i>Ongoing</h6> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="amp-pxl" style="height: 360px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End General Overview -->
            <!-- ============================================================== -->
        </div>
    </div>

    <div id="testetetetet">

    </div>

    @include('design.modals.submission-details')


    <script>
        function submissionDetails(submission) {
            var  submission = submission;
            $("#area").html(submission.area);
            $("#grade").html(submission.grade);
            $("#numberofstudents").html(submission.number_of_students);
            $("#startdateoflecture").html(submission.start_date_of_lecture);
            $("#enddateoflecture").html(submission.end_date_of_lecture);
            $("#porpose").html(submission.purpose);
            console.log(submission);
        }
    </script>
@endsection
