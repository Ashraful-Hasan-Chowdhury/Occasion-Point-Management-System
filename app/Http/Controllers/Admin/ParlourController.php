<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Parlour;
use App\Models\parlourpayment;
use Illuminate\Http\Request;

class ParlourController extends Controller
{

    public function show()
    {
        $parlours = Parlour::where('approve', '=', 'approved')
            ->Orderby('id', 'DESC')->get();
        return view('admin.parlour.show', compact('parlours'));
    }
    public function block($id)
    {
        $parlour = Parlour::findorfail($id);
        $parlour->block = "true";
        $parlour->save();
        $notification = array(
            'message' => 'Parlour Blocked Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function unblock($id)
    {
        $parlour = Parlour::findorfail($id);
        $parlour->block = "false";
        $parlour->save();
        $notification = array(
            'message' => 'Parlour Blocked Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function showrequests()
    {
        $parlours = Parlour::where('approve', '=', 'pending')
            ->Orderby('id', 'DESC')->get();
        return view('admin.parlour.request.show', compact('parlours'));
    }
    public function reject($id)
    {
        $parlour = Parlour::findorfail($id);
        $parlour->delete();
        $notification = array(
            'message' => 'Parlour Rejected Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function approve($id)
    {
        $parlour = Parlour::findorfail($id);
        $parlour->approve = 'approved';
        $parlour->save();
        $notification = array(
            'message' => 'Parlour Approved Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function approval($id)
    {
        $parlour = Parlour::findorfail($id);
        return view('admin.parlour.request.approval', compact('parlour'));
    }
    public function due()
    {
        $parlours = Parlour::where('due', '>', 4900)
            ->Orderby('id', 'DESC')->get();
        return view('admin.parlour.due.show', compact('parlours'));
    }

    public function payment()
    {
        $payments = parlourpayment::where('confirm', '!=', 'pending')
            ->Orderby('id', 'DESC')->get();
        return view('admin.parlour.payment.show', compact('payments'));
    }

    public function paymentrequest()
    {
        $payments = parlourpayment::where('confirm', '=', 'pending')
            ->Orderby('id', 'DESC')->get();
        return view('admin.parlour.payment.request', compact('payments'));
    }

    public function confirm($id, $ownerid)
    {
        $payment = parlourpayment::findorfail($id);
        $payment->confirm = 'true';
        $payment->save();
        $parlour = Parlour::findorfail($ownerid);
        $parlour->due = $parlour->due - $payment->amount;
        $parlour->save();
        $notification = array(
            'message' => 'Payment Confirmed Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function confirmandunblock($id, $ownerid)
    {
        $payment = parlourpayment::findorfail($id);
        $payment->confirm = 'true';
        $payment->save();
        $parlour = Parlour::findorfail($ownerid);
        $parlour->block = 'false';
        $parlour->due = $parlour->due - $payment->amount;
        $parlour->save();
        $notification = array(
            'message' => 'Payment Confirmed & User Unblocked Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function decline($id)
    {
        $payment = parlourpayment::findorfail($id);
        $payment->confirm = 'false';
        $payment->save();
        $notification = array(
            'message' => 'Payment Declined Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
