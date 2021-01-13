@extends('user.layouts.app')
@section('bookingactive','active')
@section('parlourbookingactive','active')
@section('content')
<!--page-title-->
<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner ttm-bgcolor-darkgrey">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title"> My Palour Bookings </h2>
                    </div>
                    <div class="heading-seperator">
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--page-title end-->
@if (Auth::check())
<div class="card">
    <div class="container card-body" style="padding: 50px;">
        <table class="table table-hover dataTable table-striped w-full" id="myTable"
            style="font-weight: 500;border: 2px solid black;">
            <thead>
                <tr>
                    <th>Booking Id</th>
                    <th>Parlour Name</th>
                    <th>Email</th>
                    <th>Booked For</th>
                    <th>Booking Amount</th>
                    <th>TrxID</th>
                    <th>Booked At</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($bookings as $booking)
                @if ($booking->user_id == auth()->id())
                <tr>
                    <td>{{$booking->id}}</td>
                    <td>
                        {{$booking->parlours[0]->name}}
                    </td>
                    <td>{{$booking->parlours[0]->email}}</td>
                    <td>{{date('d-m-Y', strtotime($booking->bookingdate))}}</td>
                    <td>{{$booking->bookingamount}} BDT</td>
                    <td>
                        {{$booking->trxid}}
                    </td>
                    <td>
                        {{date('d-m-Y', strtotime($booking->created_at))}}
                    </td>
                    <td>
                        @if ($booking->approve == 'approved')
                        <span class="badge badge-lg badge-success">Successful<span>
                                @endif
                                @if ($booking->approve == 'rejected')
                                <span class="badge badge-lg badge-danger">Failed</span>
                                @endif
                                @if ($booking->approve == 'pending')
                                <span class="badge badge-lg badge-warning">Pending</span>
                                @endif
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
<h3>Please Login to Check Your Bookings.</h3>
@endif
@endsection