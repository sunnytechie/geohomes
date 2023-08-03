<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AgentHasApproval
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->is_admin != 1) {
            if (Auth::user()->is_agent) {
                if (Auth::user()->agent->approval == "pending") {
                    return redirect()->route('dashboard.status');
                }
            }
        }

        return $next($request);
    }
}
