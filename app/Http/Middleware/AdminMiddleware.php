<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
		// Check if the authenticated user is an admin
	    if (auth()->user() && auth()->user()->isAdmin()) {
			return $next($request);
	    }
	    // If not an admin, redirect or show an error
	    return redirect('/')->with('error', 'You do not
	    have permission to perform this action.');
    }
}
