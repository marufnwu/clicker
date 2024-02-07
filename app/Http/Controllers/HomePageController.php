<?php

namespace App\Http\Controllers;

use App\Models\ClickHistory;
use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    function page(Request $request)
    {
        $userId = Auth::id();
        $currentDate = Carbon::now()->toDateString();

        $links = Link::select('links.*', DB::raw('IF(click_histories.id IS NOT NULL, true, false) AS is_clicked'))
        ->where("links.active", true)
            ->leftJoin('click_histories', function ($join) use ($userId, $currentDate) {
                $join->on('click_histories.link_id', '=', 'links.id')
                     ->whereDate('click_histories.created_at', $currentDate)
                     ->where('click_histories.user_id', $userId);
            })
            ->get();


        $data = [
            "user" => Auth::user(),
            "links" => $links,
        ];
        return view("home", $data);
    }
}
