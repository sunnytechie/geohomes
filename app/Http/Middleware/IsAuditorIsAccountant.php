<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAuditorIsAccountant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->auditor || Auth::user()->accountant || Auth::user()->is_admin || Auth::user()->manager) {
            return $next($request);
        }

        return redirect()->back()->with('message', "You are not authorized to see this info.");
        
    }
}
