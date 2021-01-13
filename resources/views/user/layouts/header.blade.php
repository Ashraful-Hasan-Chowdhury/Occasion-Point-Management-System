<header id="masthead" class="header ttm-header-style-03">
    <!--top_bar-->
    {{-- <div class="top_bar border-bottom clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="top_bar_inner d-flex flex-row align-items-center justify-content-center">
                                <div class="top_bar_contact_item">
                                    <div class="top_bar_icon"><i class="fa fa-map-marker"></i></div>24 Tech Roqad st Ny
                                    10023
                                </div>
                                <div class="top_bar_contact_item">
                                    <div class="top_bar_icon"><i class="fa fa-envelope-o"></i></div>
                                    <a href="mailto:info@example.com">info@example.com</a>
                                </div>
                                <div class="top_bar_contact_item ml-auto">
                                    <div class="top_bar_icon"><i class="ti ti-time"></i></div>Work Hour: 8:00am-6:00pm
                                </div>
                                <div class="top_bar_contact_item top_bar_social">
                                    <ul class="social-icons sub-menu">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                                <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-skincolor"
                                    href="#">Get A Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
    <!--top_bar end-->
    <!--site-header-menu-->
    <div id="site-header-menu" class="site-header-menu">
        <div class="site-header-menu-inner ttm-stickable-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!--site-navigation -->
                        <div class="site-navigation">
                            <!-- site-branding -->
                            <div class="site-branding">
                                <a class="home-link" href="{{ route('home') }}" title="wedco" rel="home">
                                    {{-- <img id="logo-img" class="img-center" src="images/logo-dark.png"
                                                alt="logo-img"> --}}
                                    <h3 class="mb-0 mt-2" style="color: #154360;">Occasion Point</h3>
                                    <h6 class="mt-0">Management System</h6>
                                </a>
                            </div><!-- site-branding end -->
                            <div class="btn-show-menu-mobile menubar menubar--squeeze">
                                <span class="menubar-box">
                                    <span class="menubar-inner"></span>
                                </span>
                            </div>
                            <!-- menu -->
                            <nav class="main-menu menu-mobile ml-auto" id="menu">
                                <ul class="menu">
                                    <li class="@yield('homeactive')"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="@yield('hallactive')"><a href="{{ route('hall') }}">Halls</a></li>
                                    {{-- <li class="mega-menu-item">
                                        <a href="#" class="mega-menu-link">Halls</a>
                                        <ul class="mega-submenu">
                                            <li><a href="about-us.html">About Us 1</a></li>
                                            <li><a href="about-us-2.html">About Us 2</a></li>
                                            <li><a href="services-1.html">services 1</a></li>
                                            <li><a href="services-2.html">services 2</a></li>
                                            <li><a href="our-events.html">Our Events</a></li>
                                            <li><a href="our-story.html">Our Story</a></li>
                                            <li><a href="our-team.html">Our Team</a></li>
                                            <li><a href="team-details.html">Team Details</a></li>
                                            <li><a href="error.html">404 Page</a></li>
                                            <li class="mega-menu-item">
                                                <a href="#" class="mega-menu-link">Shop</a>
                                                <ul class="mega-submenu">
                                                    <li><a href="shop.html">Default Shop</a></li>
                                                    <li><a href="product-details.html">Single Product
                                                            Details</a></li>
                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                </ul>
                                            </li>

                                        </ul>
                                    </li> --}}
                                    <li class="mega-menu-item logo-after-this @yield('parlouractive')">
                                        <a href="{{ route('parlour') }}" class="mega-menu-link">Parlours</a>
                                        {{-- <ul class="mega-submenu">
                                            <li><a href="lovely-decoration.html">Lovely Decoration</a></li>
                                            <li><a href="live-music-and-dj.html">Live Music & Dj</a></li>
                                            <li><a href="dinner-and-drinks.html">Dinner & Drinks</a></li>
                                            <li><a href="seating-chart.html">Seating Chart</a></li>
                                            <li><a href="responsible-sourcing.html">Responsible Sourcing</a>
                                            </li>
                                            <li><a href="costume-services.html">Costume services</a></li>
                                        </ul> --}}
                                    </li>
                                    <li class="mega-menu-item @yield('photographeractive') offset-1">
                                        <a href="{{ route('photographer') }}" class="mega-menu-link">Photographers</a>

                                    </li>
                                    <li class="mega-menu-item @yield('bookingactive')"><a href="#">Bookings</a>
                                        <ul class="mega-submenu">
                                            <li class="@yield('hallbookingactive')"><a
                                                    href="{{ route('hall.bookings') }}">Hall Booking</a></li>
                                            <li class="@yield('parlourbookingactive')"><a
                                                    href="{{ route('parlour.bookings') }}">Parlour Booking</a></li>
                                            <li class="@yield('photographerbookingactive')"><a
                                                    href="{{ route('photographer.bookings') }}">Photographer Booking</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-item @yield('useractive')">
                                        <a href="#" class="mega-menu-link ">User</a>
                                        <ul class="mega-submenu">
                                            @if (Auth::check())
                                            <li class="@yield('profileactive')"><a
                                                    href="{{route('profile')}}">Profile</a></li>
                                            <li class="@yield('passwordactive')"><a
                                                    href="{{ route('password') }}">Change Password</a></li>
                                            <li>
                                                <a class="nav-link navbar-avatar" href="{{ route('logout') }}"
                                                    role="menuitem"
                                                    onclick="event.preventDefault();
                                                                                                                                                                     document.getElementById('logout-form').submit();">
                                                    Logout

                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                            @else

                                            <li class="@yield('registeractive')"><a
                                                    href="{{ route('register') }}">Register</a></li>
                                            <li class="@yield('loginactive')"><a href="{{ route('login') }}">Login</a>
                                            </li>
                                            @endif

                                        </ul>
                                    </li>


                                </ul>
                            </nav>
                        </div><!-- site-navigation end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--site-header-menu end-->
</header>