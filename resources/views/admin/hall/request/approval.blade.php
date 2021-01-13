@extends('multiauth::layouts.app')
@section('hallactive','active')
@section('content')
<div class="page">
    <div class="page-header page-header-bordered" style="background:#0b5345;">
        <h1 class="page-title" style="color:white;">Manage Halls</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" style="color:white;">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('admin.hall') }}" style="color:white;">Manage Halls</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('admin.hall.request') }}" style="color:white;">Hall
                    Request</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('admin.hall.approval',$hallowner->id) }}"
                    style="color:white;">View More</a>
            </li>
        </ol>
    </div>

    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">

                <div class="panel-actions">
                    <a href="{{ route('admin.hall.request') }}" class="btn btn-md-block btn-warning text-light"
                        style="font-weight: bold;">
                        <i class="icon wb-arrow-left" aria-hidden="true"></i>
                    </a>
                </div>
                <h3 class="panel-title">View Hall Owner Details
                </h3>
            </header>
            <div class="panel-body container-fluid">

                <div class="form-group">
                    <h5 style="color: #0b5345;">Status: {{$hallowner->approve}}</h5>
                    <div class="example-wrap">
                        <label class="floating-label">Profile Picture</label>
                        <div class="example">
                            <input type="file" name="image" id="input-file-now" data-plugin="dropify" data-height="200"
                                data-default-file="{{ asset($hallowner->image) }}" />
                        </div>
                    </div>

                </div>
                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <input type="text" class="form-control" name="name" value="{{$hallowner->name}}" required />
                    <label class="floating-label">Name</label>
                </div>
                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <input type="email" class="form-control" name="email" value="{{$hallowner->email}}" required />
                    <label class="floating-label">Email</label>
                </div>
                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <input type="text" class="form-control" name="phone" value="{{$hallowner->phone}}" required />
                    <label class="floating-label">Phone</label>
                </div>

                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <textarea class="form-control" rows="3" name="address" required>{{$hallowner->address}}</textarea>
                    <label class="floating-label">Address</label>
                </div>

                <div class="form-group">
                    <div class="example-wrap">
                        <label class="floating-label">National ID Card Photo</label>
                        <div class="example">
                            <input type="file" name="nid" id="input-file-now" data-plugin="dropify" data-height="200"
                                data-default-file="{{ asset($hallowner->nid) }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <input type="text" class="form-control" name="hallname" value="{{$hallowner->hallname}}" required />
                    <label class="floating-label">Hall Name</label>
                </div>
                <div class="form-group">
                    <div class="example-wrap">
                        <label class="floating-label">Hall Image</label>
                        <div class="example">
                            <input type="file" name="hallimage" id="input-file-now" data-plugin="dropify"
                                data-height="200" data-default-file="{{ asset($hallowner->hallimage) }}" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="example-wrap">
                        <label class="floating-label">Hall Document</label>
                        <div class="example">
                            <input type="file" name="document" id="input-file-now" data-plugin="dropify"
                                data-height="200" data-default-file="{{ asset($hallowner->document) }}" />
                        </div>
                    </div>
                </div>

                <a href="{{ route('admin.hall.approve', ['id'=>$hallowner->id]) }}" class="btn btn-block btn-primary">
                    Approve</a>
                <a href="{{ route('admin.hall.reject', ['id'=>$hallowner->id]) }}" class="btn btn-block btn-danger">
                    Reject</a>
            </div>
        </div>
    </div>
</div>
@endsection