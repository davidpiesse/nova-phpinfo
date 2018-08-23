<?php

namespace Davidpiesse\NovaPhpinfo\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Davidpiesse\NovaPhpinfo\Tool;
use Symfony\Component\HttpFoundation\Response;

class Authorize
{
    public function handle(Request $request, Closure $next): Response
    {
        return app(Tool::class)->authorize($request)
            ? $next($request)
            : abort(403);
    }
}