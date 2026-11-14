<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Tracker;

class TrackVisit
{
 public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        Tracker::create([
            'page' => $request->path(),
            'ip' => $request->ip(),
            'status' => $response->getStatusCode(),
            'visited_at' => now(),
			'method' => $request->method(),
        ]);

        return $response;
    }
}
