<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">

    <title>OPMS Hall Owner Registration</title>

    <link rel="apple-touch-icon" href="{{asset('public/admin/assets/images/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('public/admin/assets/images/favicon.ico')}}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('public/admin/global/css/bootstrap.min599c.css?v4.0.2')}}">
    <link rel="stylesheet" href="{{asset('public/admin/global/css/bootstrap-extend.min599c.css?v4.0.2')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/site.min599c.css?v4.0.2')}}">


    <!-- Plugins -->
    <link rel="stylesheet" href="{{asset('public/admin/global/vendor/animsition/animsition.min599c.css?v4.0.2')}}">
    <link rel="stylesheet" href="{{asset('public/admin/global/vendor/asscrollable/asScrollable.min599c.css?v4.0.2')}}">
    <link rel="stylesheet" href="{{asset('public/admin/global/vendor/switchery/switchery.min599c.css?v4.0.2')}}">
    <link rel="stylesheet" href="{{asset('public/admin/global/vendor/intro-js/introjs.min599c.css?v4.0.2')}}">
    <link rel="stylesheet" href="{{asset('public/admin/global/vendor/slidepanel/slidePanel.min599c.css?v4.0.2')}}">
    <link rel="stylesheet" href="{{asset('public/admin/global/vendor/flag-icon-css/flag-icon.min599c.css?v4.0.2')}}">

    <!-- Page -->
    <link rel="stylesheet" href="{{asset('public/admin/assets/examples/css/pages/register.min599c.css?v4.0.2')}}">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('public/admin/global/fonts/web-icons/web-icons.min599c.css?v4.0.2')}}">
    <link rel="stylesheet" href="{{asset('public/admin/global/fonts/brand-icons/brand-icons.min599c.css?v4.0.2')}}">
    <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">


    <!-- Scripts -->
    <script src="{{asset('public/admin/global/vendor/breakpoints/breakpoints.min599c.js?v4.0.2')}}"></script>
    <script>
        Breakpoints();
    </script>
</head>

<body class="animsition page-register layout-full page-dark">



    <!-- Page -->
    <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
            <div class="brand">
                <img class="brand-img" src="{{asset('public/admin/assets/images/logo.png')}}" alt="...">
                <h2 class="brand-text">Occasion Point Management System</h2>
            </div>
            <p>Hall Owner Registration</p>
            <form method="post" role="form" action="{{ route('hallowner.register') }}">
                @csrf
                <div class="form-group">

                    <input id="inputName" type="text"
                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                        value="{{ old('name') }}" required placeholder="Name">

                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <input id="inputEmail" type="email"
                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                        value="{{ old('email') }}" required placeholder="Email">

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">

                    <input id="inputPassword" type="password"
                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required
                        placeholder="Password">

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <input id="inputPasswordCheck" type="password" class="form-control" name="password_confirmation"
                        required placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>
            <p>or</p>
            <a class="btn btn-primary btn-block" href="{{ route('hallowner.login') }}">
                Sign In
            </a>
        </div>
    </div>
    <!-- End Page -->


    <!-- Core  -->
    <script src="{{asset('public/admin/global/vendor/babel-external-helpers/babel-external-helpers599c.js?v4.0.2')}}">
    </script>
    <script src="{{asset('public/admin/global/vendor/jquery/jquery.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/global/vendor/popper-js/umd/popper.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/global/vendor/bootstrap/bootstrap.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/global/vendor/animsition/animsition.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/global/vendor/mousewheel/jquery.mousewheel599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/global/vendor/asscrollbar/jquery-asScrollbar.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/global/vendor/asscrollable/jquery-asScrollable.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/global/vendor/ashoverscroll/jquery-asHoverScroll.min599c.js?v4.0.2')}}"></script>

    <!-- Plugins -->
    <script src="{{asset('public/admin/global/vendor/switchery/switchery.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/global/vendor/intro-js/intro.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/global/vendor/screenfull/screenfull599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/global/vendor/slidepanel/jquery-slidePanel.min599c.js?v4.0.2')}}"></script>

    <!-- Plugins For This Page -->
    <script src="{{asset('public/admin/global/vendor/jquery-placeholder/jquery.placeholder599c.js?v4.0.2')}}"></script>

    <!-- Scripts -->
    <script src="{{asset('public/admin/global/js/Component.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/global/js/Plugin.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/global/js/Base.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/global/js/Config.min599c.js?v4.0.2')}}"></script>

    <script src="{{asset('public/admin/assets/js/Section/Menubar.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/assets/js/Section/GridMenu.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/assets/js/Section/Sidebar.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/assets/js/Section/PageAside.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/assets/js/Plugin/menu.min599c.js?v4.0.2')}}"></script>

    <!-- Config -->
    <script src="{{asset('public/admin/global/js/config/colors.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/assets/js/config/tour.min599c.js?v4.0.2')}}"></script>
    <script>
        Config.set('assets', '../assets');
    </script>

    <!-- Page -->
    <script src="{{asset('public/admin/assets/js/Site.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/global/js/Plugin/asscrollable.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/global/js/Plugin/slidepanel.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/global/js/Plugin/switchery.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/global/js/Plugin/jquery-placeholder.min599c.js?v4.0.2')}}"></script>
    <script src="{{asset('public/admin/global/js/Plugin/animate-list.min599c.js?v4.0.2')}}"></script>
    <script>
        (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
    </script>


    <!-- Google Analytics -->
    <script>
        (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../../../../www.google-analytics.com/analytics.js',
      'ga');

    ga('create', 'UA-65522665-1', 'auto');
    ga('send', 'pageview');
    </script>
</body>

</html>