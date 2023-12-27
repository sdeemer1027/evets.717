<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
           // Check if the user is authenticated and has the role of an admin
        if ($request->user() && $request->user()->id == 1) {
            return $next($request);
        }

        // Redirect unauthorized users to a specific route or show an error page
        abort(403, 'Unauthorized action.');
    }
}
