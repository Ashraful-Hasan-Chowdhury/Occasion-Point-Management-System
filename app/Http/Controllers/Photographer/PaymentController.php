<?php

namespace App\Http\Controllers\Photographer;

use App\Http\Controllers\Controller;
use App\Models\Photographer;
use App\Models\photographerpayment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('photographer.payment.create');
    }
    public function show()
    {
        $photographer = Photographer::findorfail(auth('photographer')->id());
        $payments = $photographer->payments()->orderBy('id', 'DESC')->get();
        return view('photographer.payment.show', compact('payments'));
    }

    public function store(Request $request)
    {
        $payment = new photographerpayment;
        // amount bkash_num trxid confirm
        $payment->amount = $request->amount;
        $payment->bkash_num = $request->bkash_num;
        $payment->trxid = $request->trxid;
        $payment->confirm = "pending";
        $payment->save();
        $payment->photographers()->detach();
        $payment->photographers()->sync(auth('photographer')->id());

        $notification = array(
            'message' => 'Payment Added Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
