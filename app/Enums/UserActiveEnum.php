<?php

namespace App\Enums;

enum UserActiveEnum : int
{
    case inActive = 0;
    case Active = 1;
    public function translation():string
    {
        return trans('user_active',$this->name);
    }


}
