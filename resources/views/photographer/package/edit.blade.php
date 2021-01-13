@extends('photographer.layouts.app')
@section('portfolioactive','active')
@section('content')
<div class="page">
    <div class="page-header page-header-bordered" style="background: #9400D3;">

        <h1 class="page-title" style="color:white;">Photogapher's Package</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('photographer.profile') }}" style="color:white;">Profile</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('photographer.package') }}" style="color:white;">Package</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('photographer.package.edit',$package->id) }}"
                    style="color:white;">
                    Edit Package</a></li>
        </ol>
    </div>

    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">

                <div class="panel-actions">
                    <a href="{{ route('photographer.package') }}" class="btn btn-md-block btn-warning text-light"
                        style="font-weight: bold;">
                        <i class="icon wb-arrow-left" aria-hidden="true"></i>
                    </a>

                </div>
                <h3 class="panel-title">Update Portfolio
                </h3>
            </header>
            <div class="panel-body container-fluid">
                <form autocomplete="off" action="{{ route('photographer.package.update',$package->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                        <div class="form-group form-material floating" data-plugin="formMaterial">
                            <input type="text" class="form-control" name="name" value="{{$package->name}}" required />
                            <label class="floating-label" style="font-weight: bold;">Title</label>
                        </div>

                        <div class="form-group form-material floating" data-plugin="formMaterial">
                            <label style="margin-bottom: 20px; font-weight: bold;"
                                style="font-weight: bold;">Details</label>
                            <textarea id="editor" name="details" required>{{$package->details}}</textarea>
                        </div>

                        <div class="form-group form-material floating" data-plugin="formMaterial">
                            <input type="text" class="form-control" name="price" value="{{$package->price}}" required />
                            <label class="floating-label" style="font-weight: bold;">Price</label>
                        </div>

                        <div class="example-wrap">
                            <label class="floating-label" style="font-weight: bold;">Demo </label>
                            <div class="example">
                                <input type="file" name="image" id="input-file-now" data-plugin="dropify"
                                    data-height="200" data-default-file="{{asset($package->image)}}" />
                            </div>
                        </div>

                        <div class="checkbox-custom checkbox-warning bg-info">
                            <input type="checkbox" name="discount" id="discount" @if ($package->discount == 'true')
                            checked
                            @endif
                            />
                            <label style="font-weight: bold;">Discount</label>
                        </div>

                        <div class="form-group form-material floating " data-plugin="formMaterial" id="discount_price">
                            <input type="text" class="form-control" name="discount_price"
                                value="{{$package->discount_price}}" />
                            <label class="floating-label" style="font-weight: bold;">Discount Price</label>
                        </div>
                    </div>

                    {{-- Old Images start --}}
                    <input type="hidden" name="old_image" value="{{$package->image}}">

                    {{-- Old Images end --}}

                    <button type="submit" class="btn btn-block btn-primary">
                        Save Package</button>

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
    $(document).ready(function () {
        
        var value = {{$package->discount}};
        if(value){
            $("#discount_price").show();
        }else{
            $("#discount_price").hide();
        }
        $("#discount").change(function (e) {
        $("#discount_price").toggle();
        console.log(value);
        });
    });
    
</script>
@endsection