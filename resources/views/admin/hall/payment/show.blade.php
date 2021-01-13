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
            <li class="breadcrumb-item"><a href="{{ route('admin.hall.payment') }}" style="color:white;">Payments</a>
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
                        style="font-weight: bold;">Hall
                        with Due
                    </a>
                    <a href="{{ route('admin.hall.payment') }}" class="btn btn-md-block  text-light"
                        style="font-weight: bold;background: #1F618D;">Payment
                    </a>
                    <a href="{{ route('admin.hall.payment.request') }}" class="btn btn-md-block  text-light"
                        style="font-weight: bold; background:#2E4053;">Payment Request
                    </a>
                </div>
                <h3 class="panel-title">Hall Payments</h3>
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
                            <th>Amount</th>
                            <th>Bikas Number</th>
                            <th>Trxid</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($payments as $payment)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>
                                {{$payment->owners[0]->name}}
                            </td>
                            <td>
                                {{$payment->owners[0]->hallname}}
                            </td>

                            <td>{{$payment->owners[0]->email}}</td>
                            <td>{{$payment->owners[0]->phone}}</td>
                            <td>{{$payment->amount}} BDT</td>
                            <td>
                                {{$payment->bkash_num}}
                            </td>
                            <td>
                                {{$payment->trxid}}
                            </td>
                            <td>
                                @if ($payment->confirm == 'true')
                                <span class="badge badge-lg badge-success">Successful<span>
                                        @endif
                                        @if ($payment->confirm == 'false')
                                        <span class="badge badge-lg badge-danger">Failed</span>
                                        @endif
                                        @if ($payment->confirm == 'pending')
                                        <span class="badge badge-lg badge-warning">Pending</span>
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