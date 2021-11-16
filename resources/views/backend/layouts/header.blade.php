<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown notification-list">

            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="mdi mdi-account"></i>
                <span class="d-none d-sm-inline-block ml-1 font-weight-medium">{{Auth::user()->name}}</span>
            </a>
        </li>

        <li class="dropdown notification-list">
            <a href="{{route('admin.logout')}}" class="nav-link right-bar-toggle waves-effect waves-light">
                Đăng xuất
                <i class="mdi mdi-logout-variant"></i>
            </a>
        </li>

    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="/" class="logo text-center logo-dark">
                        <span class="logo-lg">
                            <img src="assets\images\logo.png" alt="" height="42">
                            <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                        </span>
            <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">U</span> -->
                            <img src="assets\images\logo.png" alt="" height="44">
                        </span>
        </a>

        <a href="/" class="logo text-center logo-light">
                        <span class="logo-lg">
                            <img src="assets\images\logo.png" alt="" height="42">
                            <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                        </span>
            <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">U</span> -->
                            <img src="assets\images\logo.png" alt="" height="44">
                        </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>
        <li class="d-none d-lg-block">
            <a style="font-size: 18px; color: white; text-transform: uppercase" class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                Học viện nông nghiệp việt nam
            </a>
        </li>
    </ul>
</div>
