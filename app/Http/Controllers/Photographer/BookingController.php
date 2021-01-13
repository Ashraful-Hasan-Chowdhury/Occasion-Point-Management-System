<?php

namespace App\Http\Controllers\Photographer;

use App\Http\Controllers\Controller;
use App\Models\Photographer;
use App\Models\photographerbooking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function request()
    {
        $bookings = photographerbooking::where('approve', '=', 'pending')->get();
        return view('photographer.booking.request', compact('bookings'));
    }
    public function accept($id)
    {
        $booking = photographerbooking::findorfail($id);
        $booking->approve = 'approved';
        $booking->save();
        $photographer = Photographer::findorfail($booking->photographers[0]->id);
        $photographer->due = $photographer->due + (20 / 100) * $booking->bookingamount;
        $photographer->save();
        $notification = array(
            'message' => 'Booking Confirmed Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function reject($id)
    {
        $booking = photographerbooking::findorfail($id);
        $booking->approve = 'rejected';
        $booking->save();
        $notification = array(
            'message' => 'Booking Rejected!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function show()
    {
        $bookings = photographerbooking::where('approve', '!=', 'pending')
            ->orderby('id', 'desc')->get();
        return view('photographer.booking.show', compact('bookings'));
    }
}
