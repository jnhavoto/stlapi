<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile"
             style="background: url({{ asset('theme/images/background/user-info.jpg') }}) no-repeat;">
            <!-- User profile image -->
            <div class="profile-img"><img src="{{ asset('theme/images/users/profile.jpg') }}" alt="user"/>
            </div>
            <!-- User profile text-->
            <div class="profile-text"><a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown"
                                         role="button" aria-haspopup="true" aria-expanded="true">{{
                                          $user->first_name.' '.$user->last_name}}</a>
                <div class="dropdown-menu animated flipInY">
                    <a href="#" class="dropdown-item"><i class="ti-user"></i>
                        {{ __('strings.my_profile') }}
                        {{--My Profile--}}
                    </a>
                    <a href="#" class="dropdown-item"><i class="mdi mdi-wechat"></i>
                        {{ __('strings.Chats') }}
                        {{--Chats--}}
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="ti-settings"></i>
                        {{ __('strings.account') }}
                        {{--Account Setting--}}
                    </a>
                    <div class="dropdown-divider"></div>
                    {{--<a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>--}}
                    {{--<li>--}}
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById
                        ('logout-form-top').submit();" class="dropdown-item">
                        <i class="mdi mdi-power"></i>
                        {{ __('strings.Logout') }}
                        {{--Logout--}}
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

                {{--<li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i--}}
                {{--class="mdi mdi-gauge"></i><span class="hide-menu">--}}
                {{--{{ __('strings.Dashboard') }}--}}
                {{--Dashboard --}}
                {{--</span></a>--}}
                {{--<ul aria-expanded="false" class="collapse">--}}
                <li><a href="/admin">
                        <i class="ti-dashboard"></i> {{ __('strings.Dashboard') }}
                        {{--General Overview--}}
                    </a></li>
                {{--</ul>--}}
                </li>
                <li><a href="/admin/users">
                        <i class="mdi mdi-account-multiple-outline"></i> {{ __('strings.UsersDetails') }}
                        {{--General Overview--}}
                    </a></li>
                {{--</ul>--}}
                </li>
                {{--<li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i--}}
                                {{--class="mdi mdi-account-multiple-outline"></i><span class="hide-menu">--}}
                            {{--{{ __('strings.UsersDetails') }}--}}
                            {{--Activities--}}
                        {{--</span></a>--}}
                    {{--<ul aria-expanded="false" class="collapse">--}}
                        {{--<li><a href="/admin/users">--}}
                                {{--<i class="mdi mdi-account-multiple"></i> {{ __('strings.Users') }}--}}
                                {{--Courses--}}
                            {{--</a></li>--}}
                        {{--<li><a href="/admin/roles">--}}
                                {{--<i class="mdi mdi-account-card-details"></i> {{ __('strings.Roles') }}--}}
                                {{--Assignments--}}
                            {{--</a></li>--}}
                        {{--<li><a href="/admin/permissions">--}}
                                {{--<i class="mdi mdi-account-alert"></i> {{ __('strings.Permissions') }}--}}
                                {{--Calendar--}}
                            {{--</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                class="mdi mdi-book-multiple-variant"></i><span class="hide-menu">
                            {{ __('strings.Templates') }}
                            {{--Activities--}}
                        </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="/admin_course_templates">
                                <i class="mdi mdi-book-plus"></i> {{ __('strings.Courses') }}
                            </a></li>
                        <li><a href="/admin_assignment_templates">
                                <i class="mdi mdi-book-open-page-variant"></i> {{ __('strings.Assignments') }}
                            </a></li>
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
                    class="mdi mdi-power"></i></a> {{--</li>--}}
        <form id="logout-form-bottom" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <!-- End Bottom points-->
</aside>