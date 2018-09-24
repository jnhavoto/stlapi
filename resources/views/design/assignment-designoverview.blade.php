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
                        {{ __('strings.AssignmentDetails') }}
                        {{--Course Overview--}}
                    </h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">
                                {{ __('strings.Home') }}
                            </a></li>
                        <li class="breadcrumb-item"><a href="/assignments">
                                {{ __('strings.Assignments') }}
                            </a>
                        </li>
                        <li class="breadcrumb-item">   {{ __('strings.AssignmentDetails') }}
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
                                            <h3 class="card-title">{{ __('strings.AssignmentDetails') }}</h3>
                                            {{--<h6 class="card-subtitle">Ample Admin Vs Pixel Admin</h6>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="col-md-6 m-b-20">
                                        <h4>{{ __('strings.AssignmentName') }}</h4>
                                        <label> {{ $assignment->case }} </label>
                                    </div>
                                    <div>
                                        <hr class="m-t-0 m-b-0">
                                    </div>
                                    <div class="col-md-6 m-b-20">
                                        <h4>{{ __('strings.AssignmentNumber') }}</h4>
                                        <label> {{ $assignment->number }} </label>
                                    </div>
                                    <div>
                                        <hr class="m-t-0 m-b-0">
                                    </div>
                                    <div class="col-md-4 m-b-20">
                                        <h4 class="control-label">{{ __('strings.StartDate') }}</h4>
                                        <label> {{ $assignment->startdate }} </label>
                                    </div> <div>
                                        <hr class="m-t-0 m-b-0">
                                    </div>
                                    <div class="col-md-4 m-b-20">
                                        <h4 class="control-label">{{ __('strings.AvailableDate') }}</h4>
                                        <label> {{$assignment->available_date }}</label>
                                    </div>
                                    <div>
                                        <hr class="m-t-0 m-b-0">
                                    </div>
                                    <div class="col-md-4 m-b-20">
                                        <h4 class="control-label">{{ __('strings.EndDate') }}</h4>
                                        <label> {{$assignment->deadline }}</label>
                                    </div>
                                    <div>
                                        <hr class="m-t-0 m-b-0">
                                    </div>
                                    <div class="col-md-6 m-b-20">
                                        <h4 class="control-label">{{ __('strings.Members') }} </h4>
                                        @foreach($instructors as $members)
                                            <label>
                                                {{$members->teacher->user->first_name .' '.$members->teacher->user->last_name }}
                                            </label>
                                            <br/>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> {{ __('strings.Instructions') }} </h4>
                            {{--<h6 class="card-subtitle">Different Devices Used to Visit</h6>--}}
                            <label> {{$assignment->instructions }}</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 m-b-20">
                <h4 class="card-title"> {{ __('strings.AssignmentMaterial') }}  </h4>
                <hr>

                <div class="table-responsive col-md-6">
                        @if($materials->count() == 0)
                            <h5  class="card-title m-t-10">
                                {{ __('strings.NoMaterial') }}
                                {{--Course Assignments--}}
                            </h5>
                        @else
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap
                                    color-table muted-table" style="width: auto" >
                            <thead>
                            <tr>
                                <th >File name</th>
                                <th >Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($materials as $material)
                                <tr>
                                    <td>{{$material->file_name}}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm
                                                    " href="{{ asset($material->path) }}"
                                           download="{{ $material->path }}">
                                            <i text-md-center class="ti-download"> </i>
                                        </a>
                                        <a class="btn btn-danger btn-sm"
                                           href="/delete_course_file/{{$material->id}}"
                                        >
                                            <i text-md-center class="ti-trash"> </i> </a>

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
            <hr>

        </div>


        {{--Showing Assignment Status--}}
    </div>
    <script>
        function createAssignmentCleanDetails() {
            $("#case").html("");
            $("#number").html("");
            $("#instructions").val("");
            $("#assignment_id").val("");
        }
    </script>

@endsection
