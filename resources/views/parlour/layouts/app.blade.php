<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <title>OPMS Parlour</title>
  @include('parlour.layouts.head')

</head>

<body class="animsition ">

  <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-expand-md" role="navigation">

    <div class="navbar-header">
      <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
        data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
        <i class="icon wb-more-horizontal" aria-hidden="true"></i>
      </button>
      <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
        <img class="navbar-brand-logo" src="{{asset('public/admin/assets/images/logo.png')}}" title="Remark">
        <span class="navbar-brand-text hidden-xs-down">{{auth('parlour')->user()->name}}</span>
      </div>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search" data-toggle="collapse">
        <span class="sr-only">Toggle Search</span>
        <i class="icon wb-search" aria-hidden="true"></i>
      </button>
    </div>

    @include('parlour.layouts.nav')
  </nav>
  @include('parlour.layouts.sidebar')

  <!-- Page -->
  @yield('content')
  <!-- End Page -->


  <!-- Footer -->

  @include('parlour.layouts.script')
</body>

</html>