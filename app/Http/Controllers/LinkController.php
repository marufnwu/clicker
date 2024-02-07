<?php

namespace App\Http\Controllers;

use App\Models\ClickHistory;
use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LinkController extends Controller
{

    private static $clickPoint = 10;

    function click(Request $request, $id)
    {
        $lastClick = ClickHistory::where('user_id', Auth::id())
            ->latest('created_at')
            ->first();



        // Check if the last click occurred today and less than 30 seconds ago
        if ($lastClick && $lastClick->created_at->isToday() && $lastClick->created_at->diffInSeconds(Carbon::now()) < 30) {
            // Last click occurred today and less than 30 seconds ago
            // Do something...
            return response()->json([
                'error' => true,
                'message' => 'Please wait '.(30 - $lastClick->created_at->diffInSeconds(Carbon::now())).' seconds before clicking link',
            ]);
        }

        $link = Link::where('id', $id)
            ->where('active', true)
            ->whereDoesntHave('clickHistories', function ($query) use ($id) {
                $query->where('user_id', Auth::id())
                    ->where('link_id', $id)
                    ->whereDate('created_at', Carbon::today());
            })
            ->first();
        if ($link) {
            // If the link is found, return a success response with the link
            ClickHistory::create([
                "link_id" => $id,
                "user_id" => Auth::id(),
                'point'=>self::$clickPoint
            ]);
            return response()->json([
                'error' => false,
                'message' => 'Link retrieved successfully',
                'link' =>  $link->value,
            ]);
        } else {
            // If the link is not found, return an error response
            return response()->json([
                'error' => true,
                'message' => 'Link not found',
            ], 404);
        }
    }
}
