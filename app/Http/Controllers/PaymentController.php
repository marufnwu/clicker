<?php

namespace App\Http\Controllers;

use App\Enums\PaymentRequestStatus;
use App\Models\ClickHistory;
use App\Models\PaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    private const PAYMENT_THRESHOLD = 100;

    function make(Request $request)
    {


        $validator = Validator::make(
            $request->all(),
            [
                "amount" => "required|integer",
                "method" => "required",
                "pay_number" => "required|string"
            ]
        );

        if($validator->fails()){
            return back()->with("error", $validator->errors()->first());
        }

        $user = Auth::user();

        $currPoint = $user->points();
        $reqAmount  = $request->input("amount");

        if ($reqAmount > $currPoint) {
            return back()->with("error", "You don't have enough points!");
        }

        if ($reqAmount < self::PAYMENT_THRESHOLD) {
            return back()->with("error", "Minumum payout point is " . self::PAYMENT_THRESHOLD);
        }

        PaymentRequest::create(
            [
                "user_id" => $user->id,
                "amount" => $reqAmount,
                "method" => $request->input("method"),
                "pay_number" => $request->input("pay_number"),
                "status" => PaymentRequestStatus::PENDING
            ]
        );

        return back()->with("success", "Payout requesnt has been created");
    }
}
