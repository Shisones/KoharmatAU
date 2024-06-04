<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(Session::all());
        if (!Session::has('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d')) {
            // Redirect to the home page if session key doesn't exist
            return redirect('/');
        }

        return $next($request);
    }
}
