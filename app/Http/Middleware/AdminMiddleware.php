<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        // Proveri da li je korisnik prijavljen i da li ima ulogu 'admin'
        if (Auth::check() && Auth::user()->role == 0) {
            return $next($request);
        }

        // Ako nije admin, redirektuj ga na početnu stranicu (ili neku drugu stranicu)
        return redirect('/kartoni');
    }
}
