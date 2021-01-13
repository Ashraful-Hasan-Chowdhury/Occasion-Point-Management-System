@extends('user.layouts.app')
@section('useractive','active')
@section('profileactive','active')
@section('content')
<!--page-title-->
<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner ttm-bgcolor-darkgrey">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title"> User Profile </h2>
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

{{-- Login Part start --}}
<div class="site-main">
    <!--history-section-->
    <section class="ttm-row history-section pt-0 res-767-pt-0">
        <div class="container">
            <div class="row pt-40 res-991-pt-10">
                <div class="col-md-8 offset-md-3 offset-sm-0">
                    <div class="member-contact-form border">
                        <h3>User Profile</h3>
                        <form id="ttm-quote-form" class="row ttm-quote-form clearfix" method="POST"
                            action="{{ route('updateprofile') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="col-sm-12 col-md-12">
                                <label>Profile Picture</label>
                                <input type="file" name="image" id="input-file-now" class="dropify" data-height="200"
                                    data-default-file="{{ asset($user->photo) }}" />
                            </div>
                            {{-- Old image --}}
                            <input type="hidden" name="old_image" value="{{$user->photo}}">

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" name="name" value="{{$user->name}}" />
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" value="{{$user->email}}" />
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{$user->phone}}" />
                                </div>
                            </div>




                            <div class="col-md-12">
                                <div class="text-left">
                                    <button type="submit" id="submit"
                                        class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor w-100"
                                        value="">
                                        Update Profile
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
{{-- Login Part end --}}
@endsection