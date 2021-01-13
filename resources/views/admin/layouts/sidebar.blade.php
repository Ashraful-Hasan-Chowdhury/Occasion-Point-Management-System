<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu" data-plugin="menu">
                    <li class="site-menu-category">Menu</li>
                    <li class="site-menu-item has-sub @yield('homeactive')">
                        <a href="{{ route('admin.home') }}">
                            <i class="site-menu-icon wb-book" aria-hidden="true"></i>
                            <span class="site-menu-title">Home</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub @yield('hallactive')">
                        <a href="{{ route('admin.hall') }}">
                            <i class="site-menu-icon wb-briefcase" aria-hidden="true"></i>
                            <span class="site-menu-title">Manage Halls</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub @yield('parlourctive')">
                        <a href="{{ route('admin.parlour') }}">
                            <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                            <span class="site-menu-title">Manage Parlours</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub @yield('photographerctive')">
                        <a href="{{ route('admin.photographer') }}">
                            <i class="site-menu-icon wb-image" aria-hidden="true"></i>
                            <span class="site-menu-title">Manage Photographers</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>