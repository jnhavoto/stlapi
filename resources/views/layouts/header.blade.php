<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md blue-theme">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                <!-- Logo icon --><b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{ asset('theme/images/stl-logo.png') }}" alt="homepage" class="dark-logo"/>
                {{--<img src="{{ asset('theme/images/logo-icon.png') }}" alt="homepage" class="dark-logo"/>--}}
                <!-- Light Logo icon -->
                    <img src="{{ asset('theme/images/stl-logo.png') }}" alt="homepage" class="light-logo"/>
                    {{--<img src="{{ asset('theme/images/logo-light-icon.png') }}" alt="homepage" class="light-logo"/>--}}
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <!-- dark Logo text -->
            {{--<img src="{{ asset('theme/images/logo-text.png') }}" alt="homepage" class="dark-logo"/>--}}
            <!-- Light Logo text -->
                {{--<img src="{{ asset('theme/images/logo-light-text.png') }}" class="light-logo" alt="homepage"/></span>--}}
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item hidden-sm-down search-box">
                    <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                </li>
                <!-- ============================================================== -->
                <!-- Messages -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-view-grid"></i></a>
                    <div class="dropdown-menu scale-up-left">
                        <ul class="mega-dropdown-menu row">

                            <li class="col-lg-3  m-b-30">
                                <h4 class="m-b-20">CONTACT US</h4>
                                <!-- Contact -->
                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Enter email"> </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- End Messages -->
                <!-- ============================================================== -->
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="#"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="mdi mdi-message"></i>
                        <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                        <ul>
                            <li>
                                <div class="drop-title">Notifications</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Luanch Admin</h5> <span
                                                    class="mail-desc">Just see the my new admin!</span> <span
                                                    class="time">9:30 AM</span></div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span>
                                            <span class="time">9:10 AM</span></div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span>
                                            <span class="time">9:08 AM</span></div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span>
                                            <span class="time">9:02 AM</span></div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all
                                        notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- End Comment -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Messages -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" id="2"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                        <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                    </a>
                    <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                        <ul>
                            <li>
                                <div class="drop-title">You have 4 new messages</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="user-img"><img src="{{ asset('theme/images/users/1.jpg') }}"
                                                                   alt="user" class="img-circle"> <span
                                                    class="profile-status online pull-right"></span></div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span>
                                            <span class="time">9:30 AM</span></div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="user-img"><img src="{{ asset('theme/images/users/2.jpg') }}"
                                                                   alt="user" class="img-circle"> <span
                                                    class="profile-status busy pull-right"></span></div>
                                        <div class="mail-contnet">
                                            <h5>Sonu Nigam</h5> <span
                                                    class="mail-desc">I've sung a song! See you at</span> <span
                                                    class="time">9:10 AM</span></div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="user-img"><img src="{{ asset('theme/images/users/3.jpg') }}"
                                                                   alt="user" class="img-circle"> <span
                                                    class="profile-status away pull-right"></span></div>
                                        <div class="mail-contnet">
                                            <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span
                                                    class="time">9:08 AM</span></div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="user-img"><img src="{{ asset('theme/images/users/4.jpg') }}"
                                                                   alt="user" class="img-circle"> <span
                                                    class="profile-status offline pull-right"></span></div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span>
                                            <span class="time">9:02 AM</span></div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center" href="/chats"> <strong>
                                        {{ __('strings.SeeAllChats') }}
                                    </strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- End Messages -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                src="{{ asset('theme/images/users/ake.jpg') }}" alt="user" class="profile-pic"/></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="{{ asset('theme/images/users/ake.jpg') }}" alt="user">
                                    </div>
                                    <div class="u-text">
                                        <h4>{{$user->first_name.' '.$user->last_name}}</h4>
                                        <p class="text-muted">{{$user->email}}</p>
                                        <a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-user"></i> {{ __('strings.Profile') }}</a></li>
                            {{--<li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>--}}
                            <li><a href="#"><i class="mdi mdi-wechat"></i> {{ __('strings.Chats') }}</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-settings"></i> {{ __('strings.account') }} </a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-power"></i> {{ __('strings.Logout') }}
                                </a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- Language -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="locale/en">
                        <i class="flag-icon flag-icon-us"></i></a>

                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="locale/se">
                        <i class="flag-icon flag-icon-se"></i></a>

                    {{--<div class="dropdown-menu dropdown-menu-right scale-up">--}}

                        {{--<a class="dropdown-item" href="locale/se"><i class="flag-icon flag-icon-in"></i> Swedish</a>--}}

                        {{--<a class="dropdown-item" href="locale/en"><i class="flag-icon flag-icon-in"></i> Swedish</a>--}}


                    {{--</div>--}}
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->