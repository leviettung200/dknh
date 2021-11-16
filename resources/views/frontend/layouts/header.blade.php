<div class="navbar-custom">
    <div class="container">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class=" notification-list">
                <div class="nav-link dropdown-toggle nav-user mr-0 " data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="mdi mdi-account"></i>
                    <span class="d-none d-sm-inline-block ml-1 font-weight-medium">{{$student->name}}</span>
                </div>

            </li>

            <li class="dropdown notification-list">
                <a href="{{route('home.logout')}}" class="nav-link right-bar-toggle waves-effect waves-light">
                    Đăng xuất
                    <i class="mdi mdi-logout-variant"></i>
                </a>
            </li>

        </ul>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">


            <li class=" d-lg-block">
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="assets\images\logo.png" alt="" height="42">
                </a>

            </li>
            <li class="d-none d-lg-block">
                <a style="font-size: 18px; color: white; text-transform: uppercase" class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    Học viện nông nghiệp việt nam
                </a>
            </li>
        </ul>
    </div>
</div>
