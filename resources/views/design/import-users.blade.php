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
                    <h3 class="text-themecolor m-b-0 m-t-0">
                        {{ __('strings.ImportUsers') }}
                    </h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">  {{ __('strings.Home') }} </a>
                        </li>
                        <li class="breadcrumb-item active"> {{ __('strings.Users') }}
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <h2 class="text-center">
                                    {{ __('strings.ImportExcelCSV') }}
                                </h2>

                                @if ( Session::has('success') )
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <strong>{{ Session::get('success') }}</strong>
                                    </div>
                                @endif

                                @if ( Session::has('error') )
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <strong>{{ Session::get('error') }}</strong>
                                    </div>
                                @endif

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <div>
                                            @foreach ($errors->all() as $error)
                                                <p>{{ $error }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <form action="/import" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    Choose your xls/csv File : <input type="file" name="file" class="form-control">

                                    <input type="submit" class="btn btn-primary btn-lg" style="margin-top: 3%">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End of Assignment List -->
         </div>
    </div>

@endsection
