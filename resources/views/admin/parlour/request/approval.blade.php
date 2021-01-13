@extends('multiauth::layouts.app')
@section('parlourctive','active')
@section('content')
<div class="page">
    <div class="page-header page-header-bordered" style="background:#0b5345;">
        <h1 class="page-title" style="color:white;">Manage Parlours</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" style="color:white;">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('admin.parlour') }}" style="color:white;">Manage Parlours</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('admin.parlour.request') }}" style="color:white;">Parlour
                    Request</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('admin.parlour.approval',$parlour->id) }}"
                    style="color:white;">View More</a>
            </li>
        </ol>
    </div>

    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">

                <div class="panel-actions">
                    <a href="{{ route('admin.parlour.request') }}" class="btn btn-md-block btn-warning text-light"
                        style="font-weight: bold;">
                        <i class="icon wb-arrow-left" aria-hidden="true"></i>
                    </a>
                </div>
                <h3 class="panel-title">View Parlour Details
                </h3>
            </header>
            <div class="panel-body container-fluid">

                <div class="form-group">
                    <h5 style="color: #0b5345;">Status: {{$parlour->approve}}</h5>
                    <div class="example-wrap">
                        <label class="floating-label">Profile Picture</label>
                        <div class="example">
                            <input type="file" name="image" id="input-file-now" data-plugin="dropify" data-height="200"
                                data-default-file="{{ asset($parlour->image) }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <input type="text" class="form-control" name="name" value="{{$parlour->name}}" required />
                    <label class="floating-label">Name</label>
                </div>
                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <input type="email" class="form-control" name="email" value="{{$parlour->email}}" required />
                    <label class="floating-label">Email</label>
                </div>
                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <input type="text" class="form-control" name="phone" value="{{$parlour->phone}}" required />
                    <label class="floating-label">Phone</label>
                </div>

                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <textarea class="form-control" rows="3" name="address" required>{{$parlour->address}}</textarea>
                    <label class="floating-label">Address</label>
                </div>

                <div class="form-group">
                    <div class="example-wrap">
                        <label class="floating-label">National ID Card Photo</label>
                        <div class="example">
                            <input type="file" name="nid" id="input-file-now" data-plugin="dropify" data-height="200"
                                data-default-file="{{ asset($parlour->nid) }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <input type="text" class="form-control" name="parlourname" value="{{$parlour->parlourname}}"
                        required />
                    <label class="floating-label">Parlour Name</label>
                </div>
                <div class="form-group">
                    <div class="example-wrap">
                        <label class="floating-label">Parlour Image</label>
                        <div class="example">
                            <input type="file" name="parlourimage" id="input-file-now" data-plugin="dropify"
                                data-height="200" data-default-file="{{ asset($parlour->parlourimage) }}" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="example-wrap">
                        <label class="floating-label">Hall Document</label>
                        <div class="example">
                            <input type="file" name="document" id="input-file-now" data-plugin="dropify"
                                data-height="200" data-default-file="{{ asset($parlour->document) }}" />
                        </div>
                    </div>
                </div>

                <a href="{{ route('admin.parlour.approve', ['id'=>$parlour->id]) }}" class="btn btn-block btn-primary">
                    Approve</a>
                <a href="{{ route('admin.parlour.reject', ['id'=>$parlour->id]) }}" class="btn btn-block btn-danger">
                    Reject</a>

            </div>
        </div>
    </div>
</div>
@endsection