@extends('hallowner.layouts.app')
@section('paymentactive','active')
@section('content')
<div class="page">
    <div class="page-header page-header-bordered" style="background:#007bff;">

        <h1 class="page-title" style="color:white;">Halls Payment</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('hallowner.profile') }}" style="color:white;">Profile</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('hallowner.payment') }}" style="color:white;">Payment</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('hallowner.payment.add') }}" style="color:white;">Pay Now</a>
            </li>
        </ol>
    </div>

    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">

                <div class="panel-actions">
                    <a href="{{ route('hallowner.payment') }}" class="btn btn-md-block btn-warning text-light"
                        style="font-weight: bold;">
                        <i class="icon wb-arrow-left" aria-hidden="true"></i>
                    </a>

                </div>
                <h3 class="panel-title">Make Payment
                </h3>
            </header>
            <div class="panel-body container-fluid">
                <form autocomplete="off" action="{{ route('hallowner.payment.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                        <div class="form-group form-material floating" data-plugin="formMaterial">
                            <input type="text" class="form-control" name="amount" required />
                            <label class="floating-label" style="font-weight: bold;">Amount (BDT)</label>
                        </div>

                        <div class="form-group form-material floating" data-plugin="formMaterial">
                            <input type="text" class="form-control" name="bkash_num" required />
                            <label class="floating-label" style="font-weight: bold;">Enter the bikas number</label>
                        </div>

                        <div class="form-group form-material floating" data-plugin="formMaterial">
                            <input type="text" class="form-control" name="trxid" required />
                            <label class="floating-label" style="font-weight: bold;">Enter the trxid</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">
                        Make Payment</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection