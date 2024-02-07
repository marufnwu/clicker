<?php

namespace App\Http\Middleware;

use App\Enums\AccountRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MustAdminMiddleware
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

        if($user->getAccountRole()!=AccountRole::Admin->name){
            return redirect()->intended(route("home"));
        }

        // || $user->isAccountActive()

        return $next($request);
    }
}
