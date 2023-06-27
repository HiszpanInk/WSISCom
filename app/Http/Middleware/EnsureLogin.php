<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;
use App\Models\UserLoggedToken;

class EnsureLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!(session()->has('login_token'))) {
            if($request->hasCookie("login_token")) {
                $tokenInCookie = Cookie::get('login_token');
                //if user ticked to stay logged in and he visits from same browser with new session login token is checked and put into session
                if(UserLoggedToken::where('token', $tokenInCookie)->first() != null) {
                    session(['login_token' => $tokenInCookie]);
                }
            }
            return redirect()->route('index'); 
        } 
        return $next($request);
    }
}
