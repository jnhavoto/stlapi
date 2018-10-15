@extends('layouts.layout')

@section('content')
<!-- Page wrapper  -->
<!-- ============================================================== -->
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
                <h3 class="text-themecolor m-b-0 m-t-0">{{ __('strings.Chats') }}</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('strings.Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('strings.Communications') }}</li>
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
                <div class="card m-b-0">
                    <!-- .chat-row -->
                    <div class="chat-main-box">
                        <!-- .chat-left-panel -->
                        <div class="chat-left-aside">
                            <div class="open-panel"><i class="ti-angle-right"></i></div>
                            <div class="chat-left-inner">
                                <div class="form-material">
                                    <input class="form-control p-20" type="text" placeholder="{{ __('strings.ChatMessage') }}">
                                </div>
                                <ul class="chatonline style-none ">
                                    <li>
                                        <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="active"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                    </li>
                                    <li class="p-20"></li>
                                </ul>
                            </div>
                        </div>
                        <!-- .chat-left-panel -->
                        <!-- .chat-right-panel -->
                        <div class="chat-right-aside">
                            <div class="chat-main-header">
                                <div class="p-20 b-b">
                                    <h3 class="box-title">{{ __('strings.ChatMessage') }}</h3>
                                </div>
                            </div>
                            <div class="chat-rbox">
                                <ul class="chat-list p-20">
                                    <!--chat Row -->
                                    <li>
                                        <div class="chat-img"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/1.jpg" alt="user" /></div>
                                        <div class="chat-content">
                                            <h5>James Anderson</h5>
                                            <div class="box bg-light-info">Lorem Ipsum is simply dummy text of the printing & type setting industry.</div>
                                        </div>
                                        <div class="chat-time">10:56 am</div>
                                    </li>
                                    <!--chat Row -->
                                    <li>
                                        <div class="chat-img"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/2.jpg" alt="user" /></div>
                                        <div class="chat-content">
                                            <h5>Bianca Doe</h5>
                                            <div class="box bg-light-success">It’s Great opportunity to work.</div>
                                        </div>
                                        <div class="chat-time">10:57 am</div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="reverse">
                                        <div class="chat-time">10:57 am</div>
                                        <div class="chat-content">
                                            <h5>Steave Doe</h5>
                                            <div class="box bg-light-inverse">It’s Great opportunity to work.</div>
                                        </div>
                                        <div class="chat-img"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/5.jpg" alt="user" /></div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="reverse">
                                        <div class="chat-time">10:57 am</div>
                                        <div class="chat-content">
                                            <h5>Steave Doe</h5>
                                            <div class="box bg-light-inverse">It’s Great opportunity to work.</div>
                                        </div>
                                        <div class="chat-img"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/5.jpg" alt="user" /></div>
                                    </li>
                                    <!--chat Row -->
                                    <li>
                                        <div class="chat-img"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/3.jpg" alt="user" /></div>
                                        <div class="chat-content">
                                            <h5>Angelina Rhodes</h5>
                                            <div class="box bg-light-primary">Well we have good budget for the project</div>
                                        </div>
                                        <div class="chat-time">11:00 am</div>
                                    </li>
                                    <!--chat Row -->
                                </ul>
                            </div>
                            <div class="card-body b-t">
                                <div class="row">
                                    <div class="col-8">
                                        <textarea placeholder="{{ __('strings.TypeMessage') }}" class="form-control
                                        b-0"></textarea>
                                    </div>
                                    <div class="col-4 text-right">
                                        <button type="button" class="btn btn-info btn-circle btn-lg"><i class="fa fa-paper-plane-o"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .chat-right-panel -->
                    </div>
                    <!-- /.chat-row -->
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <div class="right-sidebar">
            <div class="slimscrollright">
                <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                <div class="r-panel-body">
                    <ul id="themecolors" class="m-t-20">
                        <li><b>With Light sidebar</b></li>
                        <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                        <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                        <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                        <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                        <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                        <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                        <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                        <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                        <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                        <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                        <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                        <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                        <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                    </ul>
                    <ul class="m-t-20 chatonline">
                        <li><b>Chat option</b></li>
                        <li>
                            <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    {{--<footer class="footer">--}}
        {{--© 2018 Material Pro Admin by wrappixel.com--}}
    {{--</footer>--}}
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
@endsection