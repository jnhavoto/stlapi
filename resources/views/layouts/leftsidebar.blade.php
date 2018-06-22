<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('theme/images/user.png') }}" width="48" height="48" alt="User"/>
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">José Nhavoto</div>
            <div class="email">jnhavoto@gmail.com</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
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
    <div id="menu_container" class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active menu_item">
                <a href="/">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li class="menu_item">
                <a href="/students">
                    <i class="material-icons">people</i>
                    <span>Students</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">bookmark</i>
                    <span>Courses</span>
                </a>
                <ul class="ml-menu">
                    <li class="menu_item">
                        <a href="/addcourse">
                            <span>Add Course</span>
                        </a>
                        <a href="/listcourses">
                            <span>List Courses</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">assignment</i>
                    <span>Assignents</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="/newass">Add Assignemnt</a>
                    </li>
                    <li>
                        <a href="/listass">List Assignments</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">assessment</i>
                    <span>Assessments</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="/newass">Settings</a>
                    </li>
                    <li>
                        <a href="/listass">List Assessments</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">pie_chart</i>
                    <span>Communications</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a>Announcements</a>
                    </li>
                    <li>
                        <a href="/messages">Messages</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy;2018 <a href="javascript:void(0);">STL-Teacher</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.0
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->
<script>
    // Get the container element
    var divContainer = document.getElementById("menu_container");

    // Get all buttons with class="btn" inside the container
    var items = divContainer.getElementsByClassName("menu_item");

    // Loop through the buttons and add the active class to the current/clicked button
    for (var i = 0; i < items.length; i++) {
        items[i].addEventListener("click", function() {
            alert('Clicked')
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>
