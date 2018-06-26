@extends('layouts.app')

@section('content')

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register"
             style="background-image:url({{ asset('theme/images/background/login-register.jpg') }});">
            <div class="login-box card">

                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform"
                          action="https://wrappixel.com/demos/admin-templates/material-pro/material/index.html">
                        <h3 class="box-title m-b-20">Sign In</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Username"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" placeholder="Password"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-primary pull-left p-t-0">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup"> Remember me </label>
                                </div>
                                <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i
                                            class="fa fa-lock m-r-5"></i> Forgot password?</a></div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                        type="submit">Log In
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                                <div class="social">
                                    <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip"
                                       title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip"
                                       title="Login with Google"> <i aria-hidden="true" class="fab fa-google-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->

@endsection