<?php

namespace App\Enums;

enum UserPermissionEnum : int
{
    case admin =1;
    case user = 0;

    public function translation() :string
    {
        return trans('user_permission',$this->name);
    }

}
