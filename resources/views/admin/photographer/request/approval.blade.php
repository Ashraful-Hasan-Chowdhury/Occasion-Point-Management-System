@extends('multiauth::layouts.app')
@section('photographerctive','active')
@section('content')
<div class="page">
    <div class="page-header page-header-bordered" style="background:#0b5345;">
        <h1 class="page-title" style="color:white;">Manage Photographers</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" style="color:white;">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('admin.photographer') }}" style="color:white;">Manage
                    Photographers</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('admin.photographer.request') }}"
                    style="color:white;">Photographer
                    Request</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('admin.photographer.approval',$photographer->id) }}"
                    style="color:white;">View More</a>
            </li>
        </ol>
    </div>

    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">

                <div class="panel-actions">
                    <a href="{{ route('admin.photographer') }}" class="btn btn-md-block btn-success text-light"
                        style="font-weight: bold;">Photographer
                        List
                    </a>
                    <a href="{{ route('admin.photographer.request') }}" class="btn btn-md-block text-light"
                        style="font-weight: bold;background: #9A7D0A;">+ Photographer Request
                    </a>
                    <a href="{{ route('admin.photographer.due') }}" class="btn btn-md-block btn-info text-light"
                        style="font-weight: bold;">Photographer
                        with Due
                    </a>
                    <a href="{{ route('admin.photographer.payment') }}" class="btn btn-md-block  text-light"
                        style="font-weight: bold;background: #1F618D;">Payment
                    </a>
                    <a href="{{ route('admin.photographer.payment.request') }}" class="btn btn-md-block  text-light"
                        style="font-weight: bold; background:#2E4053;">Payment Request
                    </a>
                </div>
                <h3 class="panel-title">View Photographer Details
                </h3>
            </header>
            <div class="panel-body container-fluid">

                <div class="form-group">
                    <h5 style="color: #0b5345;">Status: {{$photographer->approve}}</h5>
                    <div class="example-wrap">
                        <label class="floating-label">Profile Picture</label>
                        <div class="example">
                            <input type="file" name="image" id="input-file-now" data-plugin="dropify" data-height="200"
                                data-default-file="{{ asset($photographer->image) }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <input type="text" class="form-control" name="name" value="{{$photographer->name}}" required />
                    <label class="floating-label">Name</label>
                </div>
                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <input type="email" class="form-control" name="email" value="{{$photographer->email}}" required />
                    <label class="floating-label">Email</label>
                </div>
                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <input type="text" class="form-control" name="phone" value="{{$photographer->phone}}" required />
                    <label class="floating-label">Phone</label>
                </div>

                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <textarea class="form-control" rows="3" name="address" required>{{$photographer->about}}</textarea>
                    <label class="floating-label">About</label>
                </div>

                <div class="form-group">
                    <div class="example-wrap">
                        <label class="floating-label">National ID Card Photo</label>
                        <div class="example">
                            <input type="file" name="nid" id="input-file-now" data-plugin="dropify" data-height="200"
                                data-default-file="{{ asset($photographer->nid) }}" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="example-wrap">
                        <label class="floating-label">Sample Image One</label>
                        <div class="example">
                            <input type="file" name="sampleOne" id="input-file-now" data-plugin="dropify"
                                data-height="200" data-default-file="{{ asset($photographer->sampleOne) }}" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="example-wrap">
                        <label class="floating-label">Sample Image Two</label>
                        <div class="example">
                            <input type="file" name="document" id="input-file-now" data-plugin="dropify"
                                data-height="200" data-default-file="{{ asset($photographer->sampleTwo) }}" />
                        </div>
                    </div>
                </div>

                <a href="{{ route('admin.photographer.approve', ['id'=>$photographer->id]) }}"
                    class="btn btn-block btn-primary">
                    Approve</a>
                <a href="{{ route('admin.photographer.reject', ['id'=>$photographer->id]) }}"
                    class="btn btn-block btn-danger">
                    Reject</a>

            </div>
        </div>
    </div>
</div>
@endsection