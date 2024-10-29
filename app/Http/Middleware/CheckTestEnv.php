<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTestEnv
{

    public function handle(Request $request, Closure $next): Response
    {
        if (app()->environment() !== 'production') {
            return $next($request);
        }
        abort(404);

    }
}
