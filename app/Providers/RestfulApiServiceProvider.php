<?php

namespace App\Providers;

use App\RestfulApi\ApiResponseBuilder;
use Illuminate\Support\ServiceProvider;

class RestfulApiServiceProvider extends ServiceProvider
{
    /**
     * RegisterRequest services.
     */
    public function register(): void
    {
        $this->app->bind('ApiResponse', function () {
            return new ApiResponseBuilder();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
