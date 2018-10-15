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
                    <h3 class="text-themecolor m-b-0 m-t-0">
                        {{ __('strings.SubmissionDetails') }}
                        {{--Course Overview--}}
                    </h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">
                                {{ __('strings.Home') }}
                            </a></li>
                        <li class="breadcrumb-item"><a href="/assignments-overview">
                                {{ __('strings.Assignments') }}
                            </a>
                        </li>
                        <li class="breadcrumb-item">   {{ __('strings.SubmissionDetails') }}
                        </li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start of Assignment List -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex flex-wrap">
                                        <div>
                                            <h3 class="card-title">{{ __('strings.AssignmentSubmissionDetails') }}</h3>
                                            {{--<h6 class="card-subtitle">Ample Admin Vs Pixel Admin</h6>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="col-md-6 m-b-20">

                                        <a href="/user-details/{{$submission->student->user->id}}" >
                                            <h5 text-md-center class="ti-user">
                                            </h5>
                                            {{
                                            $submission->student->user->first_name.' '.$submission->student->user->last_name}}
                                        </a>

                                    </div>
                                    {{--<div>--}}
                                        {{--<hr class="m-t-0 m-b-0">--}}
                                    {{--</div>--}}
                                    <div class="col-md-6 m-b-20">
                                        <h5 text-md-center class="ti-calendar"> Submission: </h5>
                                        {{$submission->submission_date}}
                                    </div>

                                    <div class="col-md-12 m-b-20">
                                        <h5 class="control-label">{{ __('strings.AssignmentName') }}: </h5>
                                        {{$submission->assignment_description->case}}
                                    </div>
                                    {{--<div>--}}
                                        {{--<hr class="m-t-0 m-b-0">--}}
                                    {{--</div>--}}
                                    <div class="col-md-12 m-b-20">
                                        <h5 class="control-label">{{ __('strings.Area') }}: </h5> {{$submission->area}}
                                    </div>
                                    <div class="col-md-6 m-b-20">
                                        <h5 class="control-label">{{ __('strings.Grade') }}: </h5>
                                        {{$submission->grade}}
                                    </div>
                                    <div class="col-md-12 m-b-20">
                                        <h5 class="control-label">{{ __('strings.NumberOfStudents') }}: </h5>
                                        {{$submission->number_of_students}}
                                    </div>
                                    <div class="col-md-12 m-b-20">
                                        <h5 class="control-label">{{ __('strings.DatesOfLectures') }}: </h5>
                                        {{$submission->start_date_of_lecture. ' - '.$submission->end_date_of_lecture}}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> {{ __('strings.Purpose') }} </h5>
                            {{$submission->purpose}}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"> {{ __('strings.CurriculumRequirement') }} </h5>
                            {{$submission->curriculum_requirement}}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"> {{ __('strings.PreviewText') }} </h5>
                            {{$submission->preview_text}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- ============================================================== -->
            <!-- End of Assignment List -->
            <!-- ============================================================== -->
    </div>

    <script>

    </script>

@endsection
