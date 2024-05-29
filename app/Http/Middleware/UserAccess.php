<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $userType
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        // Check if the authenticated user's type matches the required type
        if (auth()->check() && auth()->user()->type === $userType) {
            return $next($request);
        }

        // Return a JSON response if the user does not have the required permission
        return response()->json(['error' => 'You don\'t have permission to access this page.'], 403);
    }
}
