<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu" data-plugin="menu">
                    <li class="site-menu-category">
                        @if (auth('hallowner')->user()->block == 'false' && auth('hallowner')->user()->approve ==
                        'approved')
                        <strong>Status: Active!</strong>
                        @elseif(auth('hallowner')->user()->approve ==
                        'pending')
                        <strong>Status: Pending!</strong>
                        @else
                        <strong>Status: Blocked!</strong>
                        @endif
                    </li>
                    <li class="site-menu-item has-sub @yield('profileactive')">
                        <a href="{{ route('hallowner.profile') }}">
                            <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                            <span class="site-menu-title">Profile</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub @yield('paymentactive')">
                        <a href="{{ route('hallowner.payment') }}">
                            <i class="site-menu-icon wb-payment" aria-hidden="true"></i>
                            <span class="site-menu-title">Payment</span>
                        </a>
                    </li>
                    @if (auth('hallowner')->user()->block == 'false' && auth('hallowner')->user()->approve ==
                    'approved')
                    <li class="site-menu-item has-sub @yield('hallactive')">
                        <a href="{{ route('hallowner.hall') }}">
                            <i class="site-menu-icon wb-briefcase" aria-hidden="true"></i>

                            <span class="site-menu-title">Manage Hall</span>
                        </a>
                    </li>

                    <li class="site-menu-item has-sub @yield('bookingactive')">
                        <a href="{{ route('hallowner.booking.request') }}">
                            <i class="site-menu-icon wb-book" aria-hidden="true"></i>
                            <span class="site-menu-title">Booking</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub @yield('reviewactive')">
                        <a href="{{ route('hallowner.reviews') }}">
                            <i class="site-menu-icon wb-bell" aria-hidden="true"></i>
                            <span class="site-menu-title">Reviews</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>