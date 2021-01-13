<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Photographer;
use App\Models\photographerbooking;
use App\Models\Photographerpackage;
use App\Models\Review;
use Illuminate\Http\Request;

class PhotographerController extends Controller
{
    public function index()
    {
        $photographers = Photographer::simplePaginate(12);
        return view('user.photographer.show', compact('photographers'));
    }
    public function show(Request $request)
    {
        $photographers = Photographer::all();
        $date = date('d-m-y', strtotime($request->date));
        return view('user.photographer.search', compact('photographers', 'date'));
    }
    public function details($id)
    {
        $photographer = Photographer::findorfail($id);
        return view('user.photographer.details', compact('photographer'));
    }
    public function review(Request $request, $id)
    {
        $review = new Review;
        $review->body = $request->body;
        $review->save();
        $review->users()->detach();
        $review->photographers()->detach();
        $review->users()->sync(auth()->id());
        $review->photographers()->sync($id);
        $notification = array(
            'message' => 'Review Written Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function booking(Request $request, $id)
    {
        $booking = new photographerbooking;
        $booking->user_id = auth()->id();
        $booking->bookingdate = $request->bookingdate;
        $booking->package_id = $request->package_id;
        $bookingamount = Photographerpackage::findorfail($request->package_id);
        if ($bookingamount->discount == 'true') {
            $booking->bookingamount = $bookingamount->discount_price;
        } else {
            $booking->bookingamount = $bookingamount->price;
        }
        $booking->trxid = $request->trxid;
        $booking->save();
        $booking->photographers()->detach();
        $booking->photographers()->sync($id);

        $notification = array(
            'message' => 'Wait for the approval!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function bookings()
    {
        $bookings = photographerbooking::orderBy('id', 'Desc')->get();
        return view('user.booking.photographer', compact('bookings'));
    }
}
