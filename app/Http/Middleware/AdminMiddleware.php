<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     * Handle an incoming request.
     *
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $response = $next($request);
            if (!in_array($response->getStatusCode(), [200, 201, 204,302])) {
                toastr()->error('An error has occurred, please try again later.', 'Handle Error', [
                    'closeButton' => true,
                    'showEasing' => 'swing',
                    'showMethod' => 'fadeIn',
//                    'onclick' => 'function() { window.location.href = document.referrer; }'
                ]);
                return redirect()->back();
            }
            return $response;
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An unexpected error occurred. Please try again later.']);
        }
    }


}
