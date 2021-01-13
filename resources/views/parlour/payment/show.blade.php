@extends('parlour.layouts.app')
@section('paymentactive','active')
@section('content')
<div class="page">
    <div class="page-header page-header-bordered" style="background:#CD6155;">

        <h1 class="page-title" style="color:white;">Parlour's Payment</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('parlour.profile') }}" style="color:white;">Profile</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('parlour.payment') }}" style="color:white;">Payment</a>
            </li>
        </ol>
    </div>


    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">

                <div class="panel-actions">
                    <h4 style="color: #784212;">Total Due: {{auth('parlour')->user()->due}} BDT</h4>
                </div>
                <h3 class="panel-title">Payment History
                    <a href="{{ route('parlour.payment.add') }}"
                        class="btn btn-md-block btn-success offset-4 text-light" style="font-weight: bold;">Pay Now</a>
                </h3>
            </header>
            <div class="panel-body">
                <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable"
                    style="font-weight: 500;">
                    <thead>
                        <tr>
                            <th>SL</th>
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