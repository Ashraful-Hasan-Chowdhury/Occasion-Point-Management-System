@extends('hallowner.layouts.app')
@section('profileactive','active')
@section('content')

<div class="page">
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <!-- Page Widget -->
                <div class="card card-shadow text-center">
                    <div class="card-block">
                        <a class="" href="javascript:void(0)">
                            <img src="{{asset($hallowner->image)}}"
                                style="height: 180px;width: 180px; border: 2px solid white;border-radius: 50%;">
                        </a>
                        <h4 class="profile-user">{{$hallowner->name}}</h4>
                        <p class="profile-job" style="font-weight: bold;">
                            {{$hallowner->hallname}}
                        </p>
                        <p class="profile-job" style="font-weight: bold;">
                            {{$hallowner->email}}
                        </p>
                        <p class="profile-job" style="font-weight: bold;">
                            {{$hallowner->phone}}
                        </p>
                        <p>{{$hallowner->address}}</p>
                        <div class="profile-social">
                            <strong class="profile-stat-count">
                                Joined {{$hallowner->created_at->diffForHumans()}}</strong>
                        </div>

                    </div>
                    {{-- <div class="card-footer">
                        <div class="row no-space">
                            <div class="col-4">
                                <strong class="profile-stat-count">200</strong>
                                <span>Follower</span>
                            </div>
                            <div class="col-4">
                                <strong class="profile-stat-count">180</strong>
                                <span>Following</span>
                            </div>
                            <div class="col-4">
                                <strong class="profile-stat-count">2000</strong>
                                <span>Tweets</span>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <!-- End Page Widget -->
            </div>

            <div class="col-lg-9">
                <!-- Panel -->
                <div class="panel">
                    <div class="panel-body nav-tabs-animate nav-tabs-horizontal" data-plugin="tabs">
                        <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                            <li class="nav-item" role="presentation"><a class="active nav-link" data-toggle="tab"
                                    href="#activities" aria-controls="activities" role="tab">View Profile</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab"
                                    href="#profile" aria-controls="profile" role="tab">Edit Profile</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab"
                                    href="#password" aria-controls="password" role="tab">Change Password</a></li>

                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active animation-slide-left" id="activities" role="tabpanel">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="pr-20">
                                                {{-- <a class="avatar" href="javascript:void(0)">
                                                    <img class="img-fluid"
                                                        src="{{asset('public/admin/global/portraits/3.jpg')}}"
                                                alt="...">
                                                </a> --}}
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-5">National ID Card
                                                </h5>

                                                <div class="profile-brief clearfix mt-4">
                                                    <img class="profile-uploaded" src="{{asset($hallowner->nid)}}"
                                                        alt="..." style="width: 600px;height: 200px;">
                                                    <br>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="pr-20">
                                                {{-- <a class="avatar" href="javascript:void(0)">
                                                    <img class="img-fluid"
                                                        src="{{asset('public/admin/global/portraits/3.jpg')}}"
                                                alt="...">
                                                </a> --}}
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-5">Hall Image and Document
                                                </h5>

                                                <div class="profile-brief clearfix mt-4">
                                                    <img class="profile-uploaded" src="{{asset($hallowner->hallimage)}}"
                                                        alt="..." style="width: 300px;height: 200px;">

                                                    <img class="profile-uploaded" src="{{asset($hallowner->document)}}"
                                                        alt="..." style="width: 300px;height: 200px;">

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                            {{-- edit Profile --}}
                            <div class="tab-pane animation-slide-left" id="profile" role="tabpanel">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit Your Profile</h3>
                                    </div>
                                    <div class="panel-body container-fluid">
                                        <form autocomplete="off" action="{{ route('hallowner.profile.update') }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">

                                                <div class="example-wrap">
                                                    <label class="floating-label">Profile Picture</label>
                                                    <div class="example">
                                                        <input type="file" name="image" id="input-file-now"
                                                            data-plugin="dropify" data-height="200"
                                                            data-default-file="{{ asset($hallowner->image) }}" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group form-material floating" data-plugin="formMaterial">
                                                <input type="text" class="form-control" name="name"
                                                    value="{{$hallowner->name}}" required />
                                                <label class="floating-label">Name</label>
                                            </div>
                                            <div class="form-group form-material floating" data-plugin="formMaterial">
                                                <input type="email" class="form-control" name="email"
                                                    value="{{$hallowner->email}}" required />
                                                <label class="floating-label">Email</label>
                                            </div>
                                            <div class="form-group form-material floating" data-plugin="formMaterial">
                                                <input type="text" class="form-control" name="phone"
                                                    value="{{$hallowner->phone}}" required />
                                                <label class="floating-label">Phone</label>
                                            </div>

                                            <div class="form-group form-material floating" data-plugin="formMaterial">
                                                <textarea class="form-control" rows="3" name="address"
                                                    required>{{$hallowner->address}}</textarea>
                                                <label class="floating-label">Address</label>
                                            </div>

                                            <div class="form-group">
                                                <div class="example-wrap">
                                                    <label class="floating-label">National ID Card Photo</label>
                                                    <div class="example">
                                                        <input type="file" name="nid" id="input-file-now"
                                                            data-plugin="dropify" data-height="200"
                                                            data-default-file="{{ asset($hallowner->nid) }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-material floating" data-plugin="formMaterial">
                                                <input type="text" class="form-control" name="hallname"
                                                    value="{{$hallowner->hallname}}" required />
                                                <label class="floating-label">Hall Name</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="example-wrap">
                                                    <label class="floating-label">Hall Image</label>
                                                    <div class="example">
                                                        <input type="file" name="hallimage" id="input-file-now"
                                                            data-plugin="dropify" data-height="200"
                                                            data-default-file="{{ asset($hallowner->hallimage) }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="example-wrap">
                                                    <label class="floating-label">Hall Document</label>
                                                    <div class="example">
                                                        <input type="file" name="document" id="input-file-now"
                                                            data-plugin="dropify" data-height="200"
                                                            data-default-file="{{ asset($hallowner->document) }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Old Images start --}}
                                            <input type="hidden" name="old_image" value="{{$hallowner->image}}">
                                            <input type="hidden" name="old_nid" value="{{$hallowner->nid}}">
                                            <input type="hidden" name="old_hallimage" value="{{$hallowner->hallimage}}">
                                            <input type="hidden" name="old_document" value="{{$hallowner->document}}">
                                            {{-- Old Images end --}}

                                            <button type="submit" class="btn btn-block btn-primary">Save
                                                Profile</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- Edit Profile --}}
                            {{-- Password --}}
                            <div class="tab-pane animation-slide-left" id="password" role="tabpanel">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Change Your Password</h3>
                                    </div>
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <div class="panel-body container-fluid">
                                        <form autocomplete="off" action="{{ route('hallowner.password.update') }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group form-material floating" data-plugin="formMaterial">
                                                <input type="password" class="form-control" name="old_password"
                                                    required />
                                                <label class="floating-label">Current Password</label>
                                            </div>
                                            <div class="form-group form-material floating" data-plugin="formMaterial">
                                                <input type="password" class="form-control" name="new_password"
                                                    required />
                                                <label class="floating-label">New Password</label>
                                            </div>
                                            <div class="form-group form-material floating" data-plugin="formMaterial">
                                                <input type="password" class="form-control" name="confirm_password"
                                                    required />
                                                <label class="floating-label">Confirm Password</label>
                                            </div>

                                            <button type="submit" class="btn btn-block btn-primary">
                                                Change Password
                                            </button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- Password --}}
                        </div>
                    </div>
                </div>
                <!-- End Panel -->
            </div>
        </div>
    </div>
</div>

@endsection