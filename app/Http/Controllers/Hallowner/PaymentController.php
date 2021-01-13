<?php

namespace App\Http\Controllers\Hallowner;

use App\Http\Controllers\Controller;
use App\Models\Hall_payment;
use App\Models\Hallowner;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('hallowner.payment.create');
    }
    public function show()
    {
        $hallowner = Hallowner::findorfail(auth('hallowner')->id());
        $payments = $hallowner->payments()->orderBy('id', 'DESC')->get();
        return view('hallowner.payment.show', compact('payments'));
    }

    public function store(Request $request)
    {
        $payment = new Hall_payment;
        // amount bkash_num trxid confirm
        $payment->amount = $request->amount;
        $payment->bkash_num = $request->bkash_num;
        $payment->trxid = $request->trxid;
        $payment->confirm = "pending";
        $payment->save();
        $payment->owners()->detach();
        $payment->owners()->sync(auth('hallowner')->id());

        $notification = array(
            'message' => 'Payment Added Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
