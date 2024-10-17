<?php

namespace App\RestfulApi\Facade;

use Illuminate\Support\Facades\Facade;

class Response extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'ApiResponse';
    }

}
