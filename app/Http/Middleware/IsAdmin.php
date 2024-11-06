<?php

namespace App\Http\Middleware;

use App\Enums\UserPermissionEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (!auth()->user()->is_admin == UserPermissionEnum::admin->value) {
            return redirect('/');
        }

        return $next($request);
    }
}
