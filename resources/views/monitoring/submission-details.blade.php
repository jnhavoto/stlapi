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
                <div class="col-lg-12 col-md-7">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">{{ __('strings.AssignmentSubmissionDetails') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"><strong>{{ __('strings.FullName') }}</strong>
                                    <br>
                                    <a href="/submission-details/participant-details/{{$submission->student->user->id}}" >
                                        {{$submission->student->user->first_name.' '.$submission->student->user->last_name}}
                                    </a>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"><strong>{{ __('strings.AssignmentName') }}</strong>
                                    <br>
                                    <p class="text-muted">{{$submission->assignment_description->case}}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"><strong>{{ __('strings.SubmissionDate') }}</strong>
                                    <br>
                                    <p class="text-muted">{{$submission->submission_date}}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"><strong>{{ __('strings.Area') }}</strong>
                                    <br>
                                    <p class="text-muted">{{$submission->area}}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"><strong>{{ __('strings.Grade') }}</strong>
                                    <br>
                                    @if($submission->grade != null)
                                        <p class="text-muted">{{$submission->grade}}</p>
                                    @else
                                        <p class="text-muted">{{ __('strings.None') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"><strong>{{ __('strings.NumberOfStudents') }}</strong>
                                    <br>
                                    @if($submission->number_of_students != null)
                                        <p class="text-muted">{{$submission->number_of_students}}</p>
                                    @else
                                        <p class="text-muted">{{ __('strings.None') }}</p>
                                    @endif
                                </div>

                                <div class="col-md-3 col-xs-6 b-r"><strong>{{ __('strings.DatesOfLectures') }}</strong>
                                    <br>
                                    {{--@if($submission->number_of_students != null)--}}
                                        <p class="text-muted">{{$submission->start_date_of_lecture. ' - '.$submission->end_date_of_lecture}}</p>
                                    {{--@else--}}
                                        {{--<p class="text-muted">{{ __('strings.None') }}</p>--}}
                                    {{--@endif--}}
                                </div>

                                <div class="col-md-3 col-xs-6 b-r"><strong>{{ __('strings.Purpose') }}</strong>
                                    <br>
                                    <p class="text-muted">{{$submission->purpose}}</p>
                                </div>

                                <div class="col-md-3 col-xs-6 b-r"><strong>{{ __('strings.CurriculumRequirement') }}</strong>
                                    <br>
                                    <p class="text-muted">{{$submission->curriculum_requirement}}</p>
                                </div>

                                <div class="col-md-3 col-xs-6"><strong>{{ __('strings.PreviewText') }}</strong>
                                    <br>
                                    <p class="text-muted">{{$submission->preview_text}}</p>
                                </div>
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
