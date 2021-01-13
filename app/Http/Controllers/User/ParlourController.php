<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Parlour;
use App\Models\parlourbooking;
use App\Models\parlourpackage;
use App\Models\Review;
use Illuminate\Http\Request;

class ParlourController extends Controller
{
    public function index()
    {
        $parlours = Parlour::simplePaginate(12);
        return view('user.parlour.show', compact('parlours'));
    }
    public function show(Request $request)
    {
        $parlours = Parlour::all();
        $date = date('d-m-y', strtotime($request->date));

        return view('user.parlour.search', compact('parlours', 'date'));
    }
    public function details($id)
    {
        $parlour = Parlour::findorfail($id);
        return view('user.parlour.details', compact('parlour'));
    }
    public function review(Request $request, $id)
    {
        $review = new Review;
        $review->body = $request->body;
        $review->save();
        $review->users()->detach();
        $review->parlours()->detach();
        $review->users()->sync(auth()->id());
        $review->parlours()->sync($id);
        $notification = array(
            'message' => 'Review Written Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function booking(Request $request, $id)
    {
        $booking = new parlourbooking;
        $booking->user_id = auth()->id();
        $booking->bookingdate = $request->bookingdate;
        $booking->package_id = $request->package_id;
        $bookingamount = parlourpackage::findorfail($request->package_id);
        if ($bookingamount->discount == 'true') {
            $booking->bookingamount = $bookingamount->discount_price;
        } else {
            $booking->bookingamount = $bookingamount->price;
        }
        $booking->trxid = $request->trxid;
        $booking->save();
        $booking->parlours()->detach();
        $booking->parlours()->sync($id);

        $notification = array(
            'message' => 'Wait for the approval!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function bookings()
    {
        $bookings = parlourbooking::orderBy('id', 'Desc')->get();
        return view('user.booking.parlour', compact('bookings'));
    }
}
