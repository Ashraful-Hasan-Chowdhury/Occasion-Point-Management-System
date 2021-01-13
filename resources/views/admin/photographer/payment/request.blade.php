@extends('multiauth::layouts.app')
@section('photographerctive','active')
@section('content')
<div class="page">
    <div class="page-header page-header-bordered" style="background:#0b5345;">
        <h1 class="page-title" style="color:white;">Manage Photographers</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" style="color:white;">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('admin.photographer') }}" style="color:white;">Manage
                    Photographers</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('admin.photographer.payment.request') }}"
                    style="color:white;">Payment
                    Request</a>
            </li>
        </ol>
    </div>

    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">

                <div class="panel-actions">
                    <a href="{{ route('admin.photographer') }}" class="btn btn-md-block btn-success text-light"
                        style="font-weight: bold;">Photographer
                        List
                    </a>
                    <a href="{{ route('admin.photographer.request') }}" class="btn btn-md-block text-light"
                        style="font-weight: bold;background: #9A7D0A;">+ Photographer Request
                    </a>
                    <a href="{{ route('admin.photographer.due') }}" class="btn btn-md-block btn-info text-light"
                        style="font-weight: bold;">Photographer
                        with Due
                    </a>
                    <a href="{{ route('admin.photographer.payment') }}" class="btn btn-md-block  text-light"
                        style="font-weight: bold;background: #1F618D;">Payment
                    </a>
                    <a href="{{ route('admin.photographer.payment.request') }}" class="btn btn-md-block  text-light"
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
                            <th>Photographer Name</th>
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
                                {{$payment->photographers[0]->name}}
                            </td>

                            <td>{{$payment->photographers[0]->email}}</td>
                            <td>{{$payment->amount}} BDT</td>
                            <td>{{$payment->photographers[0]->due}} BDT</td>
                            <td>
                                {{$payment->bkash_num}}
                            </td>
                            <td>
                                {{$payment->trxid}}
                            </td>

                            <td>

                                <a href="{{ route('admin.photographer.payment.confirm', ['id'=>$payment->id , 'ownerid'=>$payment->photographers[0]->id]) }}"
                                    class="btn btn-sm text-light" style="background: #17A589;">
                                    confirm
                                </a>
                                <a href="{{ route('admin.photographer.payment.decline', ['id'=>$payment->id] ) }}"
                                    class="btn btn-sm text-light" style="background: #7B241C;">decline</a>
                                <a href="{{ route('admin.photographer.payment.confirm.unblock', ['id'=>$payment->id , 'ownerid'=>$payment->photographers[0]->id]) }}"
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