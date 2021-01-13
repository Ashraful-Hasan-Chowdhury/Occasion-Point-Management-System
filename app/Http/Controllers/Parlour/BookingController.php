<?php

namespace App\Http\Controllers\Parlour;

use App\Http\Controllers\Controller;
use App\Models\Parlour;
use App\Models\parlourbooking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function request()
    {
        $bookings = parlourbooking::where('approve', '=', 'pending')->get();
        return view('parlour.booking.request', compact('bookings'));
    }
    public function accept($id)
    {
        $booking = parlourbooking::findorfail($id);
        $booking->approve = 'approved';
        $booking->save();
        $parlour = Parlour::findorfail($booking->parlours[0]->id);
        $parlour->due = $parlour->due + (20 / 100) * $booking->bookingamount;
        $parlour->save();
        $notification = array(
            'message' => 'Booking Confirmed Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function reject($id)
    {
        $booking = parlourbooking::findorfail($id);
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
        $bookings = parlourbooking::where('approve', '!=', 'pending')
            ->orderby('id', 'desc')->get();
        return view('parlour.booking.show', compact('bookings'));
    }
}
