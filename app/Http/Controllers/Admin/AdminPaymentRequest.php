<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentRequest;
use Illuminate\Http\Request;

class AdminPaymentRequest extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentRequests = PaymentRequest::with("user")->orderByDesc("id")->get();
        return view("admin.pay_request", ["requests" => $paymentRequests]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentRequest $payment )
    {
        $payment->load("user");
        return view("admin.single_pay_request", ["payment"=>$payment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentRequest $payment)
    {
        $request->validate([
            "status"=>"required|in:1,2"
        ]);

        $payment->status = $request->input("status");
        $payment->save();

        return back()->with("success", "Updated successfully.");
    }

}
