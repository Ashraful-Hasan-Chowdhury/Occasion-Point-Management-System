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
        </ol>
    </div>

    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">

                <div class="panel-actions">
                    <a href="{{ route('admin.parlour') }}" class="btn btn-md-block btn-success text-light"
                        style="font-weight: bold;">Parlour
                        List
                    </a>
                    <a href="{{ route('admin.parlour.request') }}" class="btn btn-md-block text-light"
                        style="font-weight: bold;background: #9A7D0A;">+ Parlour Request
                    </a>
                    <a href="{{ route('admin.parlour.due') }}" class="btn btn-md-block btn-info text-light"
                        style="font-weight: bold;">Parlour
                        with Due
                    </a>
                    <a href="{{ route('admin.parlour.payment') }}" class="btn btn-md-block  text-light"
                        style="font-weight: bold;background: #1F618D;">Payment
                    </a>
                    <a href="{{ route('admin.parlour.payment.request') }}" class="btn btn-md-block  text-light"
                        style="font-weight: bold; background:#2E4053;">Payment Request
                    </a>
                </div>
                <h3 class="panel-title">Parlour Requests</h3>
            </header>
            <div class="panel-body">
                <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable"
                    style="font-weight: 500;">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Owner Name</th>
                            <th>Parlour Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($parlours as $parlour)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>
                                {{$parlour->name}}
                            </td>
                            <td>
                                {{$parlour->parlourname}}
                            </td>

                            <td>{{$parlour->email}}</td>
                            <td>{{$parlour->phone}}</td>

                            <td>

                                <a href="{{ route('admin.parlour.reject', ['id'=>$parlour->id]) }}"
                                    class="btn btn-sm  btn-danger" id="delete">
                                    reject
                                </a>
                                <a href="{{ route('admin.parlour.approval', ['id'=>$parlour->id]) }}"
                                    class="btn btn-sm  btn-primary">
                                    view more
                                </a>
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