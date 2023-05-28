<?php

namespace App\Http\Middleware;

use App\Models\Property;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CountAgentPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $properties = Property::where('user_id', Auth::user()->id)->get();
        $properties->count();
        if (Auth::user()->is_agent == 1 && Auth::user()->agent->subscribed == 0 && $properties >= 3) {
            //redirect to notice page
        }
        return $next($request);
    }
}
