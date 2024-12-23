<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('api_key');
        $validApiKey = env('API_KEY');
        if ($apiKey !== $validApiKey) {
            return response()->json([
                'status' => 'error',
                'message' => 'the user not permissions',
            ], 401);
        }
        return $next($request);
    }
}
