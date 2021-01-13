<?php

namespace App\Http\Controllers\Hallowner;

use App\Http\Controllers\Controller;
use App\Models\hall_booking;
use App\Models\Hallowner;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function request()
    {
        $bookings = hall_booking::where('approve', '=', 'pending')->get();
        return view('hallowner.booking.request', compact('bookings'));
    }
    public function accept($id)
    {
        $booking = hall_booking::findorfail($id);
        $booking->approve = 'approved';
        $booking->save();
        $owner = Hallowner::findorfail($booking->halls[0]->owners[0]->id);
        $owner->due = $owner->due + (20 / 100) * $booking->bookingamount;
        $owner->save();
        $notification = array(
            'message' => 'Booking Confirmed Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function reject($id)
    {
        $booking = hall_booking::findorfail($id);
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
        $bookings = hall_booking::where('approve', '!=', 'pending')
            ->orderby('id', 'desc')->get();
        return view('hallowner.booking.show', compact('bookings'));
    }
}
