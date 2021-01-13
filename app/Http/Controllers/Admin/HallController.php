<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hall_payment;
use App\Models\Hallowner;
use Illuminate\Http\Request;

class HallController extends Controller
{
    public function show()
    {
        $hallowners = Hallowner::where('approve', '=', 'approved')
            ->Orderby('id', 'DESC')->get();
        return view('admin.hall.show', compact('hallowners'));
    }

    public function block($id)
    {
        $hallowner = Hallowner::findorfail($id);
        $hallowner->block = "true";
        $hallowner->save();
        $notification = array(
            'message' => 'Hall Blocked Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function unblock($id)
    {
        $hallowner = Hallowner::findorfail($id);
        $hallowner->block = "false";
        $hallowner->save();
        $notification = array(
            'message' => 'Hall Unblocked Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function showrequests()
    {
        $hallowners = Hallowner::where('approve', '=', 'pending')
            ->Orderby('id', 'DESC')->get();
        return view('admin.hall.request.show', compact('hallowners'));
    }
    public function reject($id)
    {
        $hallowner = Hallowner::findorfail($id);
        $hallowner->delete();
        $notification = array(
            'message' => 'Hall Rejected Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function approve($id)
    {
        $hallowner = Hallowner::findorfail($id);
        $hallowner->approve = 'approved';
        $hallowner->save();
        $notification = array(
            'message' => 'Hall Approved Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function approval($id)
    {
        $hallowner = Hallowner::findorfail($id);
        return view('admin.hall.request.approval', compact('hallowner'));
    }

    public function due()
    {
        $hallowners = Hallowner::where('due', '>', 4900)
            ->Orderby('id', 'DESC')->get();
        return view('admin.hall.due.show', compact('hallowners'));
    }

    public function payment()
    {
        $payments = Hall_payment::where('confirm', '!=', 'pending')
            ->Orderby('id', 'DESC')->get();
        return view('admin.hall.payment.show', compact('payments'));
    }

    public function paymentrequest()
    {
        $payments = Hall_payment::where('confirm', '=', 'pending')
            ->Orderby('id', 'DESC')->get();
        return view('admin.hall.payment.request', compact('payments'));
    }

    public function confirm($id, $ownerid)
    {
        $payment = Hall_payment::findorfail($id);
        $payment->confirm = 'true';
        $payment->save();
        $hallowner = Hallowner::findorfail($ownerid);
        $hallowner->due = $hallowner->due - $payment->amount;
        $hallowner->save();
        $notification = array(
            'message' => 'Payment Confirmed Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function confirmandunblock($id, $ownerid)
    {
        $payment = Hall_payment::findorfail($id);
        $payment->confirm = 'true';
        $payment->save();
        $hallowner = Hallowner::findorfail($ownerid);
        $hallowner->block = 'false';
        $hallowner->due = $hallowner->due - $payment->amount;
        $hallowner->save();

        $notification = array(
            'message' => 'Payment Confirmed & User Unblocked Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function decline($id)
    {
        $payment = Hall_payment::findorfail($id);
        $payment->confirm = 'false';
        $payment->save();
        $notification = array(
            'message' => 'Payment Declined Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
