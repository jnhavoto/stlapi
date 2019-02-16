<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile"
             style="background: url({{ asset('theme/images/background/user-info.jpg') }}) no-repeat;">
            <!-- User profile image -->
            <div class="profile-img"><img src="{{ asset('theme/images/users/person.png') }}" alt="user"/>
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
                        <li><a href="/">
                                {{ __('strings.general_overview') }}
                                {{--General Overview--}}
                            </a></li>
                    {{--</ul>--}}
                </li>
                <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                class="mdi mdi-email"></i><span class="hide-menu">
                            {{ __('strings.Design') }}
                            {{--Activities--}}
                        </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="/courses">
                                {{ __('strings.Courses') }}
                                {{--Courses--}}
                            </a></li>
                        <li><a href="/assignments">
                                {{ __('strings.Assignments') }}
                                {{--Assignments--}}
                            </a></li>
                        <li><a href="/calendar">
                                {{ __('strings.Calendar') }}
                                {{--Calendar--}}
                            </a></li>
                    </ul>
                </li>
                <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                class="mdi mdi-email"></i><span class="hide-menu">
                            {{ __('strings.Monitoring') }}
                            {{--Activities--}}
                        </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="/courses-overview" >
                                {{ __('strings.Courses') }}
                            </a></li>
                            <li><a href="/assignments-overview" >
                                    {{ __('strings.Assignments') }}
                                </a></li>
                            <li><a href="/selfassessments-overview" >
                                    {{ __('strings.Self_Assesssments') }}
                                </a></li>
                            <li><a href="/feedbacks-overview" >
                                    {{ __('strings.Feedbacks') }}
                                </a></li>
                        </ul>
                </li>

            <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="mdi mdi-bullseye"></i><span class="hide-menu">
                        {{ __('strings.Communications') }}
                        {{--Communications--}}
                    </span></a>
                <ul aria-expanded="false" class="collapse">

                    <li><a href="/contacts">
                            {{ __('strings.Contacts') }}
                            {{--Contacts--}}
                        </a></li>
                    <li><a href="/announcements/inbox">
                            {{ __('strings.Announcements') }}
                            {{--Notifications--}}
                        </a></li>
                    <li><a href="/chats">
                            {{ __('strings.Chats') }}
                            {{--Chats--}}
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