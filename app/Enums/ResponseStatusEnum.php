<?php

namespace App\Enums;

enum ResponseStatusEnum : int
{
    case OK = 200;
    case FORBIDDEN = 403;
    case NOT_FOUND = 404;
    case INTERNAL_SERVER_ERROR = 500;

    public function translation():string
    {
        return trans('response.status.'.$this->name);
    }


}
