@extends('photographer.layouts.app')
@section('portfolioactive','active')
@section('content')
<div class="page">
    <div class="page-header page-header-bordered" style="background: #9400D3;">

        <h1 class="page-title" style="color:white;">Photogapher's Portfolio</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('photographer.profile') }}" style="color:white;">Profile</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('photographer.portfolio') }}"
                    style="color:white;">Portfolio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('photographer.portfolio.add') }}" style="color:white;">Add
                    Portfolio</a></li>
        </ol>
    </div>

    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">

                <div class="panel-actions">
                    <a href="{{ route('photographer.portfolio') }}" class="btn btn-md-block btn-warning text-light"
                        style="font-weight: bold;">
                        <i class="icon wb-arrow-left" aria-hidden="true"></i>
                    </a>

                </div>
                <h3 class="panel-title">Add Portfolio
                </h3>
            </header>
            <div class="panel-body container-fluid">
                <form autocomplete="off" action="{{ route('photographer.portfolio.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                        <div class="form-group form-material floating" data-plugin="formMaterial">
                            <input type="text" class="form-control" name="title" required />
                            <label class="floating-label">Title</label>
                        </div>

                        <div class="form-group form-material floating" data-plugin="formMaterial">
                            <label style="margin-bottom: 20px; font-weight: bold;">Details</label>
                            <textarea id="editor" name="details" required></textarea>
                        </div>

                        <div class="example-wrap">
                            <label class="floating-label" style="font-weight: bold;">Image One</label>
                            <div class="example">
                                <input type="file" name="imageone" id="input-file-now" data-plugin="dropify"
                                    data-height="200" data-default-file="" required />
                            </div>
                        </div>

                        <div class="example-wrap">
                            <label class="floating-label" style="font-weight: bold;">Image Two</label>
                            <div class="example">
                                <input type="file" name="imagetwo" id="input-file-now" data-plugin="dropify"
                                    data-height="200" data-default-file="" required />
                            </div>
                        </div>

                        <div class="example-wrap">
                            <label class="floating-label" style="font-weight: bold;">Image Three</label>
                            <div class="example">
                                <input type="file" name="imagethree" id="input-file-now" data-plugin="dropify"
                                    data-height="200" data-default-file="" required />
                            </div>
                        </div>

                        <div class="example-wrap">
                            <label class="floating-label" style="font-weight: bold;">Image Four</label>
                            <div class="example">
                                <input type="file" name="imagefour" id="input-file-now" data-plugin="dropify"
                                    data-height="200" data-default-file="" required />
                            </div>
                        </div>

                    </div>

                    {{-- Old Images start --}}
                    {{-- <input type="hidden" name="old_image" value="{{$photographer->image}}">
                    <input type="hidden" name="old_nid" value="{{$photographer->nid}}">
                    <input type="hidden" name="old_sampleOne" value="{{$photographer->sampleOne}}">
                    <input type="hidden" name="old_sampleTwo" value="{{$photographer->sampleTwo}}"> --}}
                    {{-- Old Images end --}}

                    <button type="submit" class="btn btn-block btn-primary">
                        Save Portfolio</button>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('editor', {
     filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
     filebrowserUploadMethod: 'form'
 })
 CKEDITOR.config.height = 250;
</script>
@endsection