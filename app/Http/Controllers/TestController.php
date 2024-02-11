<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    function test(Request $request)
    {
        // Get client IP address
        $ipAddress = $request->ip();

        // Get client user agent
        $userAgent = $request->userAgent();

        // Get all headers
        $headers = $request->header();

        // You can access specific header values like this
        $acceptLanguage = $request->header('Accept-Language');

        // You can also get the request method (GET, POST, etc.)
        $method = $request->method();

        // Other request information
        $path = $request->path();
        $url = $request->url();
        $fullUrl = $request->fullUrl();

        // Additional information about the request
        $all = $request->all(); // Retrieve all input data

        // You can customize the response with the gathered information
        return response()->json([
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'headers' => $headers,
            'accept_language' => $acceptLanguage,
            'method' => $method,
            'path' => $path,
            'url' => $url,
            'full_url' => $fullUrl,
            'all_input' => $all,
        ]);
    }
}
