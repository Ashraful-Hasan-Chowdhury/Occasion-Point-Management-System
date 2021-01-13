<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.layouts.head')
</head>

<body>
    <!--page start-->
    <div class="page">
        <!--header start-->
        @include('user.layouts.header')
        <!--header end-->

        @yield('content')

        <!--site-main start-->

        <!--footer start-->
        @include('user.layouts.footer')
        <!--footer end-->


        <!--back-to-top start-->
        <a id="totop" href="#top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!--back-to-top end-->

    </div><!-- page end -->


    @include('user.layouts.scripts')

</body>

</html>