<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiKeyMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $key = $request->header('X-API-KEY');
        // $key = $request->header('X-API-KEY') ?? $request->query('api_key');

        if (!$key || $key !== env('DELPHI_API_KEY')) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }

        return $next($request);
    }
}