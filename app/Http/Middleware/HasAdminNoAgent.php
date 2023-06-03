<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HasAdminNoAgent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
        $exists = Agent::where('user_id', Auth::user()->id)->exists();
        if ($exists) {
            return $next($request);
        } else {
            return redirect()->route('agent.profile.join', Auth::user()->id);
        }
        
        
    }
}
