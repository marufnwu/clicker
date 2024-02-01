<?php

namespace App\Http\Controllers;

use App\Enums\AccountRole;
use App\Enums\AccountStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function submitSignup(Request $request){
        $defaultAccountStatus = AccountStatus::Active->value;

        $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|max:14',
            'gender' => 'required|in:' . implode(',', User::$gender),
            'area' => 'required|string|max:50',
            'refer_by_code' => 'nullable',
        ]);

        $referByCode = $request->input("refer_by_code");

        $newUser = new User($request->except(['refer_by_code']));


        $level = 1;

        if(isset($referByCode)){
            //need to check user refer code first
            $refer_user = User::byReferCode($referByCode);

            if($referByCode){
                return redirect()->back()->with("error", "Refer code not found, try without refer code or enter a valid refer code.");
            }

            $newUser->refer_by = $refer_user->id;
            $level = ($refer_user->level)+1;
        }

        $newUser->refer_code = User::generateUniqueReferCode();
        $newUser->status = $defaultAccountStatus;

        $newUser->role = AccountRole::User->value;
        $newUser->last_active = now();
        $newUser->level = $level;

        if($newUser->save()){
            return redirect("login")->with("success", "Account Created Successfully");
        }



    }

    function submitLogin(Request $request) {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attemptWhen(
            ['email' => $email, 'password' => $password],
            function (User $user) {
                return $user->isAccountActive();
            }, true
        )) {

            // Authentication successful
            return redirect()->intended(route("home"));
        }

        // Authentication failed
        return redirect()->back()->with("error", "Email and Password do not match");
    }
}
