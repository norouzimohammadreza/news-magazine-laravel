<?php

namespace App\Enums;

enum PostSelectedEnum: int
{
    case notSelected = 0;
    case isSelected = 1;

    public function translation(): string
    {
        return trans('post_selected', $this->name);
    }

}
