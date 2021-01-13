@extends('hallowner.layouts.app')
@section('hallactive','active')
@section('content')
<div class="page">
    <div class="page-header page-header-bordered" style="background:#007bff;">

        <h1 class="page-title" style="color:white;">Manage Halls</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('hallowner.profile') }}" style="color:white;">Profile</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('hallowner.hall') }}" style="color:white;">Manage Halls</a>
            </li>
        </ol>
    </div>


    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">

                <div class="panel-actions">

                </div>
                <h3 class="panel-title">Hall List
                    <a href="{{ route('hallowner.hall.add') }}" class="btn btn-md-block btn-success offset-4 text-light"
                        style="font-weight: bold;">+ Add
                        Hall</a>
                </h3>
            </header>
            <div class="panel-body">
                <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable"
                    style="font-weight: 500;">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Regular Price</th>
                            <th>Discount Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($halls as $hall)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>
                                {{$hall->name}}
                            </td>
                            <td>
                                {!!htmlspecialchars_decode($hall->address)!!}
                            </td>
                            <td>{{$hall->amount}}</td>
                            <td>
                                @if ($hall->discount == 'true')
                                <span class="badge badge-lg badge-success">Available</span>
                                @else

                                <span class="badge badge-lg badge-danger">Unavailable</span>

                                @endif
                            </td>
                            <td>

                                <a href="{{ route('hallowner.hall.edit', ['id'=>$hall->id]) }}"
                                    class="btn btn-md  btn-info"><i class="icon wb-pencil" aria-hidden="true"></i></a>

                                <a href="{{ route('hallowner.hall.destroy', ['id'=>$hall->id]) }}"
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