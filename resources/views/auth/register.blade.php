@extends('user.layouts.app')
@section('useractive','active')
@section('registeractive','active')
@section('content')
<!--page-title-->
<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner ttm-bgcolor-darkgrey">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title"> User Registration</h2>
                    </div>
                    <div class="heading-seperator">
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--page-title end-->

{{-- Register Part start --}}
<div class="site-main">
    <!--history-section-->
    <section class="ttm-row history-section pt-0 res-767-pt-0">
        <div class="container">
            <div class="row pt-40 res-991-pt-10">
                <div class="col-md-8 offset-md-3 offset-sm-0">
                    <div class="member-contact-form border">
                        <h3>User Registration</h3>
                        <form id="ttm-quote-form" class="row ttm-quote-form clearfix" method="POST"
                            action="{{ route('register') }}">
                            @csrf
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" placeholder="Your Name"
                                        autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Your Email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Confirm Password">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="text-left">
                                    <button type="submit" id="submit"
                                        class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor w-100"
                                        value="">
                                        submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- history-section end -->


</div>
{{-- Register Part end --}}
@endsection