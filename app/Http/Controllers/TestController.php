<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    function test()
    {
        $userId = Auth::id();
        $currentDate = Carbon::now()->toDateString();

        // $unclickedLinks = DB::table('links')
        //     ->whereNotExists(function ($query) use ($userId, $currentDate) {
        //         $query->select(DB::raw(1))
        //             ->from('click_histories')
        //             ->whereRaw('click_histories.link_id = links.id')
        //             ->where('click_histories.user_id', '=', $userId)
        //             ->whereDate('click_histories.created_at', '=', $currentDate);
        //     })
        //     ->get();

        $links = Link::select('links.*', DB::raw('IF(click_histories.id IS NOT NULL, true, false) AS is_clicked'))
            ->leftJoin('click_histories', function ($join) use ($userId, $currentDate) {
                $join->on('click_histories.link_id', '=', 'links.id')
                     ->whereDate('click_histories.created_at', $currentDate)
                     ->where('click_histories.user_id', $userId);
            })
            ->get();


        dd($links);
    }
}
