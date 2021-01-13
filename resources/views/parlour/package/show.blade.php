@extends('parlour.layouts.app')
@section('packageactive','active')
@section('content')
<div class="page">
    <div class="page-header page-header-bordered" style="background:#CD6155;">

        <h1 class="page-title" style="color:white;">Parlour's Package</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('parlour.profile') }}" style="color:white;">Profile</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('parlour.package') }}" style="color:white;">Package</a>
            </li>
        </ol>
    </div>


    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">

                <div class="panel-actions">

                </div>
                <h3 class="panel-title">Package List
                    <a href="{{ route('parlour.package.add') }}"
                        class="btn btn-md-block btn-success offset-4 text-light" style="font-weight: bold;">+ Add
                        Package</a>
                </h3>
            </header>
            <div class="panel-body">
                <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable"
                    style="font-weight: 500;">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Regular Price</th>
                            <th>Discount Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($packages as $package)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>
                                {{$package->name}}
                            </td>
                            <td>{{$package->price}}</td>
                            <td>
                                @if ($package->discount == 'true')
                                <span class="badge badge-lg badge-success">Available</span>
                                @else

                                <span class="badge badge-lg badge-danger">Unavailable</span>

                                @endif
                            </td>
                            <td>

                                <a href="{{ route('parlour.package.edit', ['id'=>$package->id]) }}"
                                    class="btn btn-md  btn-info"><i class="icon wb-pencil" aria-hidden="true"></i></a>

                                <a href="{{ route('parlour.package.destroy', ['id'=>$package->id]) }}"
                                    class="btn btn-md  btn-danger" id="delete"><i class="icon wb-trash"
                                        aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection