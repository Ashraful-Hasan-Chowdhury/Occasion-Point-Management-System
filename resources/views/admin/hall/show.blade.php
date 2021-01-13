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
        </ol>
    </div>

    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">

                <div class="panel-actions">
                    <a href="{{ route('admin.hall') }}" class="btn btn-md-block btn-success text-light"
                        style="font-weight: bold;">Hall
                        List
                    </a>
                    <a href="{{ route('admin.hall.request') }}" class="btn btn-md-block text-light"
                        style="font-weight: bold;background: #9A7D0A;">+ Hall Request
                    </a>
                    <a href="{{ route('admin.hall.due') }}" class="btn btn-md-block btn-info text-light"
                        style="font-weight: bold;">Hall with Due
                    </a>
                    <a href="{{ route('admin.hall.payment') }}" class="btn btn-md-block  text-light"
                        style="font-weight: bold;background: #1F618D;">Payment
                    </a>
                    <a href="{{ route('admin.hall.payment.request') }}" class="btn btn-md-block  text-light"
                        style="font-weight: bold; background:#2E4053;">Payment Request
                    </a>
                </div>
                <h3 class="panel-title">Hall List</h3>
            </header>
            <div class="panel-body">
                <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable"
                    style="font-weight: 500;">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Owner Name</th>
                            <th>Hall Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Due</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($hallowners as $hallowner)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>
                                {{$hallowner->name}}
                            </td>
                            <td>
                                {{$hallowner->hallname}}
                            </td>

                            <td>{{$hallowner->email}}</td>
                            <td>{{$hallowner->phone}}</td>
                            <td>{{$hallowner->due}} BDT</td>

                            <td>

                                @if ($hallowner->block == "true")
                                Blocked
                                @else
                                Active
                                @endif
                            </td>
                            <td>

                                @if ($hallowner->block == "true")
                                <a href="{{ route('admin.hall.unblock', ['id'=>$hallowner->id]) }}"
                                    class="btn btn-md  btn-info">
                                    activate now
                                </a>
                                @else
                                <a href="{{ route('admin.hall.block', ['id'=>$hallowner->id]) }}"
                                    class="btn btn-md  btn-danger">block now</a>
                                @endif
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