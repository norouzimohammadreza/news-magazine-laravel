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
        if ($request->query('lang')) {
            Session::put('lang', $request->query('lang'));
            App::setLocale(Session::get('lang'));
            return redirect()->back();
        }

        App::setLocale(Session::get('lang', 'fa'));
        return $next($request);
    }
}
