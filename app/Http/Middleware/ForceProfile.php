<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ForceProfile
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return $next($request);
        }

        if (Auth::user()) {// I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
            if($request->routeis('profile.create') || $request->routeIs('profile.store')){
                return $next($request);
            }
            $user = auth()->user();

            if ($user->profile == null ) {
                return redirect(route('profile.create'));
            }


        }
        return $next($request);
    }
}
