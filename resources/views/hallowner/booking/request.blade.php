@extends('hallowner.layouts.app')
@section('bookingactive','active')
@section('content')
<div class="page">
    <div class="page-header page-header-bordered" style="background: #007bff;">

        <h1 class="page-title" style="color:white;">Hall Bookings</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('hallowner.profile') }}" style="color:white;">Profile</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('hallowner.booking.request') }}" style="color:white;">Booking
                    Request</a>
            </li>
        </ol>
    </div>

    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">

                <div class="panel-actions">

                </div>
                <h3 class="panel-title">Booking Request
                    <a href="{{ route('hallowner.booking') }}" class="btn btn-md-block btn-success offset-4 text-light"
                        style="font-weight: bold;">Booking List</a>
                </h3>
            </header>
            <div class="panel-body">
                <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable"
                    style="font-weight: 500;">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Hall Name</th>
                            <th>Hall Address</th>
                            <th>Booking Date</th>
                            <th>User Name</th>
                            <th>User Phone</th>
                            <th>Amount</th>
                            <th>TrxID</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($bookings as $booking)
                        @if ($booking->halls[0]->owners[0]->id == auth('hallowner')->id())
                        <tr>
                            <td>{{$booking->id}}</td>
                            <td>
                                {{$booking->halls[0]->name}}
                            </td>
                            <td>
                                {!!htmlspecialchars_decode($booking->halls[0]->address)!!}
                            </td>
                            <td>{{date('d-m-Y', strtotime($booking->bookingdate))}}</td>
                            <td>{{$booking->users->name}}</td>
                            <td>{{$booking->users->phone}}</td>
                            <td>{{$booking->bookingamount}}</td>
                            <td>{{$booking->trxid}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ route('hallowner.booking.accept', ['id'=>$booking->id]) }}"
                                            class="btn btn-md  btn-info">
                                            <i class="icon wb-check"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('hallowner.booking.reject', ['id'=>$booking->id]) }}"
                                            class="btn btn-md  btn-danger" id="delete">
                                            <i class="icon wb-close"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection