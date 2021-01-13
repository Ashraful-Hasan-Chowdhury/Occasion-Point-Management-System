@extends('hallowner.layouts.app')
@section('hallactive','active')
@section('content')
<div class="page">
    <div class="page-header page-header-bordered" style="background: #007bff;">

        <h1 class="page-title" style="color:white;">Manage Halls</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('hallowner.profile') }}" style="color:white;">Profile</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('hallowner.hall') }}" style="color:white;">Manage Halls</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('hallowner.hall.add') }}" style="color:white;">Add
                    Hall</a></li>
        </ol>
    </div>

    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">

                <div class="panel-actions">
                    <a href="{{ route('hallowner.hall') }}" class="btn btn-md-block btn-warning text-light"
                        style="font-weight: bold;">
                        <i class="icon wb-arrow-left" aria-hidden="true"></i>
                    </a>

                </div>
                <h3 class="panel-title">Add Hall
                </h3>
            </header>
            <div class="panel-body container-fluid">
                <form autocomplete="off" action="{{ route('hallowner.hall.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                        <div class="example-wrap">
                            <label class="floating-label" style="font-weight: bold;">Hall Image </label>
                            <div class="example">
                                <input type="file" name="image" id="input-file-now" data-plugin="dropify"
                                    data-height="200" data-default-file="" required />
                            </div>
                        </div>

                        <div class="form-group form-material floating" data-plugin="formMaterial">
                            <input type="text" class="form-control" name="name" required />
                            <label class="floating-label" style="font-weight: bold;">Name</label>
                        </div>

                        <div class="form-group form-material floating" data-plugin="formMaterial">
                            <label style="margin-bottom: 20px; font-weight: bold;"
                                style="font-weight: bold;">Address</label>
                            <textarea id="editor" name="address" required></textarea>
                        </div>

                        <div class="form-group form-material floating" data-plugin="formMaterial">
                            <input type="text" class="form-control" name="space" required />
                            <label class="floating-label" style="font-weight: bold;">Space</label>
                        </div>

                        <div class="form-group form-material floating" data-plugin="formMaterial">
                            <label style="margin-bottom: 20px; font-weight: bold;"
                                style="font-weight: bold;">Details</label>
                            <textarea id="editor2" name="details" required></textarea>
                        </div>

                        <div class="form-group form-material floating" data-plugin="formMaterial">
                            <input type="text" class="form-control" name="amount" required />
                            <label class="floating-label" style="font-weight: bold;">Price</label>
                        </div>



                        <div class="checkbox-custom checkbox-warning bg-info">
                            <input type="checkbox" name="discount" id="discount" />
                            <label style="font-weight: bold;">Discount</label>
                        </div>

                        <div class="form-group form-material floating " data-plugin="formMaterial" id="discount_price">
                            <input type="text" class="form-control" name="discount_amount" />
                            <label class="floating-label" style="font-weight: bold;">Discount Price</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">
                        Save Hall</button>

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

<script>
    CKEDITOR.replace('editor2', {
     filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
     filebrowserUploadMethod: 'form'
 })
 CKEDITOR.config.height = 250;
</script>
<script>
    $(document).ready(function () {
        $("#discount_price").hide();
        $("#discount").change(function (e) {
        $("#discount_price").toggle();
        });
    });
</script>

@endsection