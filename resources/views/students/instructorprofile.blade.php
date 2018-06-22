@extends('layouts.layout')

@section('content')
    {{--<div class="container">--}}
    <div class="row">
        {{--<h2>Create your snippet's HTML, CSS and Javascript in the editor tabs</h2>--}}

        <div class="col-md-7 ">
            <div class="panel panel-default">
                <div class="panel-heading">  <h4 >User Profile</h4></div>
                <div class="panel-body">

                    <div class="box box-info">

                        <div class="box-body">
                            <div class="col-sm-6">
                                <div  align="center"> <img alt="User Pic"
                                                           src=".../assets/img/avatar_male.jpg"
                                                           id="profile-image1"
                                                           class="img-circle img-responsive">

                                    <input id="profile-image-upload" class="hidden" type="file">
                                    <div style="color:#999;" >click here to change profile image</div>
                                    <!--Upload Image Js And Css-->
                                </div>

                                <br> <!-- /input-group -->
                            </div>
                            <div class="col-sm-6">
                                <h4 style="color:#00b1b1;">User full name</h4></span>
                                <span><p>Instructor</p></span>
                            </div>
                            <div class="clearfix"></div>
                            <hr style="margin:5px 0 5px 0;">


                            <div class="col-sm-5 col-xs-6 tital " >First Name(s):</div><div class="col-sm-7
                                col-xs-6 ">my first names</div>
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital " >Last Name(s):</div><div class="col-sm-7">
                                my last name</div>
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital " >Telephone:</div><div class="col-sm-7">my
                                phone</div>

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7">my email</div>

                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                    </div>


                </div>
            </div>
        </div>
        <script>
            $(function() {
                $('#profile-image1').on('click', function() {
                    $('#profile-image-upload').click();
                });
            });
        </script>









    </div>
    {{--</div>--}}

@endsection
