<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->user()) {
            return $next($request);
        }
        if ($request->ajax() || $request->wantsJson()) {
            $response = [
                'success' => false,
                'status' =>401,
                'message' => 'Unauthenticated .',
                'data' => [],

            ];

            return abort(response()->json($response , 401));
        }
        else {
            $response = [
                'success' => false,
                'status' =>400,
                'message' => 'Bad Wrong .',
                'data' => [],

            ];

            return abort(response()->json($response , 400));
        }

    }
}

