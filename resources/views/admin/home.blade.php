@extends('multiauth::layouts.app')
@section('homeactive','active')
@section('content')
<div class="page">
    <div class="page-header page-header-bordered" style="background:#0E6251;">
        <h1 class="page-title" style="color:white;">Admin Panel Home</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" style="color:white;">Home</a>
            </li>
        </ol>
    </div>

    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Card -->
                        <div class="card card-block p-30 bg-blue-600">
                            <div class="card-watermark darker font-size-80 m-15"><i class="icon wb-clipboard"
                                    aria-hidden="true"></i></div>
                            <div class="counter counter-md counter-inverse text-left">
                                <div class="counter-number-group">
                                    <span class="counter-number">{{ $parlours }}</span>
                                    <span class="counter-number-related text-capitalize">parlours</span>
                                </div>
                                <div class="counter-label text-capitalize">total registered</div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                    <div class="col-md-6">
                        <!-- Card -->
                        <div class="card card-block p-30 bg-red-600">
                            <div class="card-watermark darker font-size-80 m-15"><i class="icon wb-users"
                                    aria-hidden="true"></i></div>
                            <div class="counter counter-md counter-inverse text-left">
                                <div class="counter-number-group">
                                    <span class="counter-number">{{ $users }}</span>
                                    <span class="counter-number-related text-capitalize">Users</span>
                                </div>
                                <div class="counter-label text-capitalize">total registered</div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <!-- Card -->
                        <div class="card card-block p-30 bg-green-600">
                            <div class="card-watermark darker font-size-60 m-15"><i class="icon wb-briefcase"
                                    aria-hidden="true"></i></div>
                            <div class="counter counter-md counter-inverse text-left">
                                <div class="counter-number-group">
                                    <span class="counter-number">{{ $hallowners }}</span>
                                    <span class="counter-number-related text-capitalize">hall owners</span>
                                </div>
                                <div class="counter-label text-capitalize">total registered</div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>

                    <div class="col-md-6">
                        <!-- Card  -->
                        <div class="card card-block p-30 bg-purple-600">
                            <div class="card-watermark lighter font-size-60 m-15"><i class="icon wb-image"
                                    aria-hidden="true"></i></div>
                            <div class="counter counter-md counter-inverse text-left">
                                <div class="counter-number-wrap font-size-30">
                                    <span class="counter-number">{{ $photographers }}</span>
                                    <span class="counter-number-related text-capitalize">photographers</span>
                                </div>
                                <div class="counter-label text-capitalize">Total Registered</div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection