<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile" style="background: url({{ asset('theme/images/background/user-info.jpg') }}) no-repeat;">
            <!-- User profile image -->
            <div class="profile-img"> <img src="{{ asset('theme/images/users/profile.jpg') }}" alt="user" />
            </div>
            <!-- User profile text-->
            <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown"
                                          role="button" aria-haspopup="true" aria-expanded="true">{{
                                          $user->first_name.' '.$user->last_name}}</a>
                <div class="dropdown-menu animated flipInY">
                    <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                    {{--<a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>--}}
                    <a href="#" class="dropdown-item"><i class="mdi mdi-wechat"></i> Chats</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                    <div class="dropdown-divider"></div>
                    {{--<a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>--}}
                    {{--<li>--}}
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById
                        ('logout-form-top').submit();" class="dropdown-item">
                            <i class="mdi mdi-power"></i> Logout
                        </a>
                    {{--</li>--}}

                    <form id="logout-form-top" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                {{--<li class="nav-small-cap">PERSONAL</li>--}}
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="/">General Overview</a></li>
                        <li><a href="index2.html">Statistics</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                class="mdi mdi-email"></i><span class="hide-menu">Activities</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="/courses">Courses</a></li>
                        <li><a href="/assignments">Assignments </a></li>
                        <li><a href="/add-course">Add Course</a></li>
                        <li><a href="/add-assignment">Add Assignment</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                class="mdi mdi-bullseye"></i><span class="hide-menu">Communications</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="/calendar">Calendar</a></li>
                        <li><a href="/contacts">Contacts</a></li>
                        <li><a href="app-email.html">Notifications</a></li>
                        <li><a href="/chats">Chats</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item--><a href="#" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item--><a href="#" class="link" data-toggle="tooltip" title="Chat"><i class="mdi mdi-wechat"></i></a>
        {{--<!-- item--><a href="#" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>--}}
        <!-- item--><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById
                        ('logout-form-bottom').submit();" class="link" data-toggle="tooltip" title="Logout"><i
                    class="mdi mdi-power"></i></a>       {{--</li>--}}
        <form id="logout-form-bottom" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <!-- End Bottom points-->
</aside>