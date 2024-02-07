<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AccountStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminDashbaord extends Controller
{
    function adminLogout()  {
        Auth::logout();
        return redirect()->intended(route("login"));
    }

    function suspendUser(User $user) {
        $user->status = AccountStatus::Banned;
        $user->save();
        return back()->with(["success", "User Suspended"]);
    }

    function unSuspendUser(User $user) {
        $user->status = AccountStatus::Active;
        $user->save();
        return back()->with(["success", "User UnSuspended"]);
    }

    function dashboard(){
        return view("admin.dashboard");
    }

    function users() {
        $users  = User::all();
        return view("admin.users", ["users" => $users]);
    }

    function profile(User $user) {
        $user->load("referBy");
        return view("admin.profile", ["user" => $user]);
    }

    function links(){
        return view("admin.links");
    }

    function userReferral(User $user){
        $referral = DB::select("
        WITH RECURSIVE referral AS (
            SELECT * FROM users WHERE id = :userId
            UNION
            SELECT users.* FROM referral JOIN users ON referral.id = users.refer_by
        )
        SELECT * FROM referral WHERE referral.id != :exclUser
        ", ['userId' => $user->id, 'exclUser' => $user->id]);

        return view("admin.refer_list", ["users" => $referral]);
    }

    function clickHistory(User $user){
        $user->load(["clickHistory", "clickHistory.link"]);
        return view("admin.click_history", ["user" => $user]);
    }


}
