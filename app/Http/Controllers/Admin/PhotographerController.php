<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photographer;
use App\Models\photographerpayment;
use Illuminate\Http\Request;

class PhotographerController extends Controller
{
    public function show()
    {
        $photographers = Photographer::where('approve', '=', 'approved')
            ->Orderby('id', 'DESC')->get();
        return view('admin.photographer.show', compact('photographers'));
    }
    public function block($id)
    {
        $photographer = Photographer::findorfail($id);
        $photographer->block = "true";
        $photographer->save();
        $notification = array(
            'message' => 'Photographer Blocked Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function unblock($id)
    {
        $photographer = Photographer::findorfail($id);
        $photographer->block = "false";
        $photographer->save();
        $notification = array(
            'message' => 'Photographer Blocked Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function showrequests()
    {
        $photographers = Photographer::where('approve', '=', 'pending')
            ->Orderby('id', 'DESC')->get();
        return view('admin.photographer.request.show', compact('photographers'));
    }
    public function reject($id)
    {
        $photographer = Photographer::findorfail($id);
        $photographer->delete();
        $notification = array(
            'message' => 'Photographer Rejected Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function approve($id)
    {
        $photographer = Photographer::findorfail($id);
        $photographer->approve = 'approved';
        $photographer->save();
        $notification = array(
            'message' => 'Photographer Approved Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function approval($id)
    {
        $photographer = Photographer::findorfail($id);
        return view('admin.photographer.request.approval', compact('photographer'));
    }
    public function due()
    {
        $photographers = Photographer::where('due', '>', 4900)
            ->Orderby('id', 'DESC')->get();
        return view('admin.photographer.due.show', compact('photographers'));
    }

    public function payment()
    {
        $payments = photographerpayment::where('confirm', '!=', 'pending')
            ->Orderby('id', 'DESC')->get();
        return view('admin.photographer.payment.show', compact('payments'));
    }

    public function paymentrequest()
    {
        $payments = photographerpayment::where('confirm', '=', 'pending')
            ->Orderby('id', 'DESC')->get();
        return view('admin.photographer.payment.request', compact('payments'));
    }

    public function confirm($id, $ownerid)
    {
        $payment = photographerpayment::findorfail($id);
        $payment->confirm = 'true';
        $payment->save();
        $photographer = Photographer::findorfail($ownerid);
        $photographer->due = $photographer->due - $payment->amount;
        $photographer->save();
        $notification = array(
            'message' => 'Payment Confirmed Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function confirmandunblock($id, $ownerid)
    {
        $payment = photographerpayment::findorfail($id);
        $payment->confirm = 'true';
        $payment->save();
        $photographer = Photographer::findorfail($ownerid);
        $photographer->block = 'false';
        $photographer->due = $photographer->due - $payment->amount;
        $photographer->save();
        $notification = array(
            'message' => 'Payment Confirmed & User Unblocked Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function decline($id)
    {
        $payment = photographerpayment::findorfail($id);
        $payment->confirm = 'false';
        $payment->save();
        $notification = array(
            'message' => 'Payment Declined Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
