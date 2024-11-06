<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

class RedirectIfAuth extends RedirectIfAuthenticated
{
    protected function defaultRedirectUri(): string
    {
        return route('admin.dashboard');
    }

}
