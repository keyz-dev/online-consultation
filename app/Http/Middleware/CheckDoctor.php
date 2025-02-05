<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckDoctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            // Redirect to the login page
            return redirect()->route('home.index');
        }
        // Check if the authenticated user is an doctor
        if (Auth::user()->role !== 'doctor') {
           abort(403, "Unauthorized action");
        }
        return $next($request);
    }
}
