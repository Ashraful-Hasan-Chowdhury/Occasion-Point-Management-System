@extends('parlour.layouts.app')
@section('bookingactive','active')
@section('content')
<div class="page">
    <div class="page-header page-header-bordered" style="background: #CD6155;">

        <h1 class="page-title" style="color:white;">Parlour Bookings</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('parlour.profile') }}" style="color:white;">Profile</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('parlour.booking') }}" style="color:white;">Booking List
                </a>
            </li>
        </ol>
    </div>

    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">

                <div class="panel-actions">

                </div>
                <h3 class="panel-title">Booking List
                    <a href="{{ route('parlour.booking.request') }}"
                        class="btn btn-md-block btn-success offset-4 text-light" style="font-weight: bold;">Booking
                        Request</a>
                </h3>
            </header>
            <div class="panel-body">
                <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable"
                    style="font-weight: 500;">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Package Name</th>
                            <th>Booking Date</th>
                            <th>User Name</th>
                            <th>User Phone</th>
                            <th>Amount</th>
                            <th>TrxID</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($bookings as $booking)
                        @if ($booking->parlours[0]->id == auth('parlour')->id())
                        <tr>
                            <td>{{$booking->id}}</td>
                            <td>
                                {{$booking->packages->name}}
                            </td>
                            <td>{{date('d-m-Y', strtotime($booking->bookingdate))}}</td>
                            <td>{{$booking->users->name}}</td>
                            <td>{{$booking->users->phone}}</td>
                            <td>{{$booking->bookingamount}}</td>
                            <td>{{$booking->trxid}}</td>
                            <td>
                                @if ($booking->approve == 'approved')
                                <span class="badge badge-lg badge-success">
                                    <i class="icon wb-check"></i>
                                    <span>
                                        @endif
                                        @if ($booking->approve == 'rejected')
                                        <span class="badge badge-lg badge-danger">
                                            <i class="icon wb-close"></i>
                                        </span>
                                        @endif
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