<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class HandleApiExceptions
{
    public function handle($request, Closure $next)
    {
        try {
            return $next($request);
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                $status = $e instanceof HttpException ? $e->getStatusCode() : 500;

                return response()->json([
                    'status' => 'error',
                    'message' => $e->getMessage(),
                ], $status);
            }
            throw $e;
        }
    }
}
