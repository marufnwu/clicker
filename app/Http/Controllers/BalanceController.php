<?php

namespace App\Http\Controllers;

use App\Models\ClickHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    function clickBalance(Request $request)  {
        $clickBalance = Auth::user()->points();
        return response()->json(['clickBalance'=>$clickBalance], 200);
    }
}
