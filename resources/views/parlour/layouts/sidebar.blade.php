<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu" data-plugin="menu">
                    <li class="site-menu-category">
                        @if (auth('parlour')->user()->block == 'false' && auth('parlour')->user()->approve ==
                        'approved')
                        <strong>Status: Active!</strong>
                        @elseif(auth('parlour')->user()->approve ==
                        'pending')
                        <strong>Status: Pending!</strong>
                        @else
                        <strong>Status: Blocked!</strong>
                        @endif
                    </li>
                    <li class="site-menu-item has-sub @yield('profileactive')">
                        <a href="{{ route('parlour.profile') }}">
                            <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                            <span class="site-menu-title">Profile</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub @yield('paymentactive')">
                        <a href="{{ route('parlour.payment') }}">
                            <i class="site-menu-icon wb-payment" aria-hidden="true"></i>
                            <span class="site-menu-title">Payment</span>
                        </a>
                    </li>
                    @if (auth('parlour')->user()->block == 'false' && auth('parlour')->user()->approve ==
                    'approved')
                    <li class="site-menu-item has-sub @yield('packageactive')">
                        <a href="{{ route('parlour.package') }}">
                            <i class="site-menu-icon wb-plugin" aria-hidden="true"></i>
                            <span class="site-menu-title">Package</span>
                        </a>
                    </li>

                    <li class="site-menu-item has-sub @yield('bookingactive')">
                        <a href="{{ route('parlour.booking.request') }}">
                            <i class="site-menu-icon wb-book" aria-hidden="true"></i>
                            <span class="site-menu-title">Booking</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub @yield('reviewactive')">
                        <a href="{{ route('parlour.reviews') }}">
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