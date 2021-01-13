<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\hall_booking;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class HallController extends Controller
{
    public function index()
    {
        $halls = Hall::simplePaginate(12);
        return view('user.hall.show', compact('halls'));
    }
    public function show(Request $request)
    {
        $halls = Hall::all();
        $date = date('d-m-y', strtotime($request->date));

        return view('user.hall.search', compact('halls', 'date'));
    }
    public function details($id)
    {
        $hall = Hall::findorfail($id);
        return view('user.hall.details', compact('hall'));
    }
    public function review(Request $request, $id)
    {
        $review = new Review;
        $review->body = $request->body;
        $review->save();
        $review->users()->detach();
        $review->halls()->detach();
        $review->users()->sync(auth()->id());
        $review->halls()->sync($id);
        $notification = array(
            'message' => 'Review Written Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function booking(Request $request, $id)
    {
        $booking = new hall_booking;
        $booking->user_id = auth()->id();
        $booking->bookingdate = $request->bookingdate;
        $booking->bookingamount = $request->bookingamount;
        $booking->trxid = $request->trxid;
        $booking->save();
        $booking->halls()->detach();
        $booking->halls()->sync($id);

        $notification = array(
            'message' => 'Wait for the approval!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function bookings()
    {
        $bookings = hall_booking::orderBy('id', 'Desc')->get();
        return view('user.booking.hall', compact('bookings'));
    }
}
