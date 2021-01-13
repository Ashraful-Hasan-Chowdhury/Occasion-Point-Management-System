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
            <li class="breadcrumb-item"><a href="{{ route('admin.hall.payment.request') }}" style="color:white;">Payment
                    Request</a>
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
                <h3 class="panel-title">Payment Requests
                </h3>
            </header>
            <div class="panel-body">
                <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable"
                    style="font-weight: 500;">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Hall Name</th>
                            <th>Email</th>
                            <th>Amount</th>
                            <th>Due</th>
                            <th>Bikas Number</th>
                            <th>Trxid</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($payments as $payment)
                        <tr>
                            <td>{{$loop->index+1}}</td>

                            <td>
                                {{$payment->owners[0]->hallname}}
                            </td>

                            <td>{{$payment->owners[0]->email}}</td>
                            <td>{{$payment->amount}} BDT</td>
                            <td>{{$payment->owners[0]->due}} BDT</td>
                            <td>
                                {{$payment->bkash_num}}
                            </td>
                            <td>
                                {{$payment->trxid}}
                            </td>

                            <td>

                                <a href="{{ route('admin.hall.payment.confirm', ['id'=>$payment->id , 'ownerid'=>$payment->owners[0]->id]) }}"
                                    class="btn btn-sm text-light" style="background: #17A589;">
                                    confirm
                                </a>
                                <a href="{{ route('admin.hall.payment.decline', ['id'=>$payment->id]) }}"
                                    class="btn btn-sm text-light" style="background: #7B241C;">decline</a>
                                <a href="{{ route('admin.hall.payment.confirm.unblock', ['id'=>$payment->id , 'ownerid'=>$payment->owners[0]->id]) }}"
                                    class="btn btn-sm text-light" style="background: #229954;">
                                    confirm & active
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