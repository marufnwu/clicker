<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    function page() {

        $user = Auth::user();
        $clickBalance = $user->getClickBalance();
        return view("profile", ['user'=>$user, "clickBalance"=>$clickBalance]);
    }
}
