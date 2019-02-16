<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('theme/images/users/person.png') }}" width="48" height="48" alt="User"/>
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{$user->first_name.' '.$user->last_name}}
            </div>
            <div class="email">
                {{$user->email}}
            </div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>
                            {{ __('strings.Profile') }}
                            {{--Profile--}}
                        </a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="index.html">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">widgets</i>
                    <span>Widgets</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Cards</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="">Basic</a>
                            </li>
                            <li>
                                <a href="">Colored</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">perm_media</i>
                    <span>Medias</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="pages/medias/image-gallery.html">Image Gallery</a>
                    </li>
                    <li>
                        <a href="pages/medias/carousel.html">Carousel</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">pie_chart</i>
                    <span>Charts</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="pages/charts/morris.html">Morris</a>
                    </li>
                    <li>
                        <a href="pages/charts/flot.html">Flot</a>
                    </li>
                    <li>
                        <a href="pages/charts/chartjs.html">ChartJS</a>
                    </li>
                    <li>
                        <a href="pages/charts/sparkline.html">Sparkline</a>
                    </li>
                    <li>
                        <a href="pages/charts/jquery-knob.html">Jquery Knob</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">content_copy</i>
                    <span>Example Pages</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="pages/examples/sign-in.html">Sign In</a>
                    </li>
                    <li>
                        <a href="pages/examples/sign-up.html">Sign Up</a>
                    </li>
                    <li>
                        <a href="pages/examples/forgot-password.html">Forgot Password</a>
                    </li>
                    <li>
                        <a href="pages/examples/blank.html">Blank Page</a>
                    </li>
                    <li>
                        <a href="pages/examples/404.html">404 - Not Found</a>
                    </li>
                    <li>
                        <a href="pages/examples/500.html">500 - Server Error</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">map</i>
                    <span>Maps</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="pages/maps/google.html">Google Map</a>
                    </li>
                    <li>
                        <a href="pages/maps/yandex.html">YandexMap</a>
                    </li>
                    <li>
                        <a href="pages/maps/jvectormap.html">jVectorMap</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy;2018 <a href="javascript:void(0);">STL</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->