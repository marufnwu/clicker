<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    function page() {

        $user = Auth::user();
        $clickBalance = $user->points();
        $level = $user->level();

        $notice = Notice::where("enabled", true)->orderByDesc("id")->first();

        return view("profile", ['user'=>$user, "clickBalance"=>$clickBalance, 'level'=>$level, "notice"=>$notice]);
    }

    function updateProfilePhoto(Request $request){
        // Validate the incoming request with proper rules
        $request->validate([
            'profile-photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);

        // Get the authenticated user
        $user = Auth::user();
        // Handle file upload
        $profilePhotoPath = $request->file('profile-photo')->store('profile-photos', 'public'); // Adjust storage path as needed
        // Update the user model with the new profile photo path
        $user->update(['photo_url' => $profilePhotoPath]);

        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'Profile photo updated successfully');
    }
}
