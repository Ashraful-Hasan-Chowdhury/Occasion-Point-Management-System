<div class="navbar-container container-fluid">
    <!-- Navbar Collapse -->
    <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
        <ul class="nav navbar-toolbar">
            <li class="nav-item hidden-float" id="toggleMenubar">
                <a class="nav-link" data-toggle="menubar" href="#" role="button">
                    <i class="icon hamburger hamburger-arrow-left">
                        <span class="sr-only">Toggle menubar</span>
                        <span class="hamburger-bar"></span>
                    </i>
                </a>
            </li>
            {{-- Write your text here --}}
            <h3 class="text-info" style="margin-left: 180px;">
                Occasion Point Management System - System Admin </h3>
        </ul>
        <!-- End Navbar Toolbar -->

        <!-- Navbar Toolbar Right -->
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
            <li class="nav-item dropdown">
                <a class="nav-link navbar-avatar" href="{{ route('admin.password.change') }}" role="menuitem">
                    <i class="icon wb-wrench btn btn-sm btn-warning" aria-hidden="true"></i>

                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link navbar-avatar" href="{{ route('admin.logout') }}" role="menuitem" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                    <i class="icon wb-power btn btn-sm btn-danger" aria-hidden="true"></i>

                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
        <!-- End Navbar Toolbar Right -->
    </div>
    <!-- End Navbar Collapse -->

</div>