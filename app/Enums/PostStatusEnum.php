<?php

namespace App\Enums;

enum PostStatusEnum: int
{
    case inVisible = 0;
    case visible = 1;

    public function translation(): string
    {
        return trans('post.status.'. $this->name);
    }
}
