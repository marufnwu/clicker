<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MustLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!Auth::check()){
            return redirect()->intended(route("login"));
        }

        $user = Auth::user();

        if(!$user->isAccountActive()){
            Auth::logout();
            return redirect()->intended(route("login"))->with(["error"=>"Account is not active"]);
        }



        return $next($request);
    }
}
