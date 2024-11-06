<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LangMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Session::has('lang')) {
            App::setLocale(Session::get('lang'));
        }
        return $next($request);
    }
}
