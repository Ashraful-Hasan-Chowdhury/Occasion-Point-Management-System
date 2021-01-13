<?php

namespace App\Http\Controllers\Parlour;

use App\Http\Controllers\Controller;
use App\Models\Parlour;
use App\Models\parlourpayment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('parlour.payment.create');
    }
    public function show()
    {
        $parlour = Parlour::findorfail(auth('parlour')->id());
        $payments = $parlour->payments()->orderBy('id', 'DESC')->get();
        return view('parlour.payment.show', compact('payments'));
    }

    public function store(Request $request)
    {
        $payment = new parlourpayment;
        // amount bkash_num trxid confirm
        $payment->amount = $request->amount;
        $payment->bkash_num = $request->bkash_num;
        $payment->trxid = $request->trxid;
        $payment->confirm = "pending";
        $payment->save();
        $payment->parlours()->detach();
        $payment->parlours()->sync(auth('parlour')->id());

        $notification = array(
            'message' => 'Payment Added Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
