<?php

namespace App\Enums;

enum CommentStatusEnum : int
{
    case unseen = 0;
    case seen = 1;
    case approved = 2;


    public function translation():string
    {
        return trans('comment_status.'. $this->name);
    }

}
