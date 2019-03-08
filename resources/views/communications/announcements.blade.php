@extends('layouts.layout')

@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-xlg-2 col-lg-4 col-md-4">
                                <div class="card-body inbox-panel">
                                    <a href="/announcements/compose"
                                       class="btn btn-danger m-b-20 p-10 btn-block waves-effect waves-light">
                                        {{ __('strings.Compose') }}
                                    </a>
                                    <ul class="list-group list-group-full">
                                        <li class="list-group-item {{$label == 'inbox' ? 'active' : ''}}">
                                            <a href="/announcements/inbox"> <i class="mdi mdi-file-document-box"></i> {{ __('strings.Inbox') }} </a>
                                            <span class="badge badge-success ml-auto">{{$count_inbox}}</span>
                                        </li>
                                        <li class="list-group-item {{$label == 'sent' ? 'active' : ''}}"> 
                                        <a href="/announcements/sent"><i class="mdi mdi-gmail"></i> {{ __('strings.Sent') }} </a>
                                            <span class="badge badge-success ml-auto">{{ $count_sent }}</span>
                                        </li>
                                        <li class="list-group-item {{$label == 'draft' ? 'active' : ''}}">
                                            <a href="/announcements/draft"> <i class="mdi mdi-send"></i> {{ __('strings.Draft') }} </a>
                                            <span class="badge badge-danger ml-auto"> {{ $count_draft}} </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-xlg-10 col-lg-8 col-md-8">
                                <div class="card-body">
                                    <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                        <button type="button" class="btn btn-secondary font-18"><i class="mdi mdi-inbox-arrow-down"></i></button>
                                        <button type="button" class="btn btn-secondary font-18"><i class="mdi mdi-alert-octagon"></i></button>
                                        <button type="button" class="btn btn-secondary font-18"><i class="mdi mdi-delete"></i></button>
                                    </div>
                                    <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-folder font-18 "></i> </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="#">Dropdown link</a> <a class="dropdown-item" href="#">Dropdown link</a> </div>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-label font-18"></i> </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="#">Dropdown link</a> <a class="dropdown-item" href="#">Dropdown link</a> </div>
                                        </div>
                                    </div>
                                    <button type="button " class="btn btn-secondary m-r-10 m-b-10"><i class="mdi mdi-reload font-18"></i></button>
                                    <div class="btn-group m-b-10" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary p-10 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> More </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="#">Mark as all read</a> <a class="dropdown-item" href="#">Dropdown link</a> </div>
                                    </div>
                                </div>
                                @yield('announcements')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
