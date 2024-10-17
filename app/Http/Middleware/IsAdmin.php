<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() and !$request->is('/')) {

            return redirect('/');
        }
        $user = auth()->user();
        if ($user->is_admin == 0 and !$request->is('/')) {

            return redirect('/');
        }
        return $next($request);
    }
}
