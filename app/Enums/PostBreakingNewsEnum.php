<?php

namespace App\Enums;

enum PostBreakingNewsEnum : int
{
    case notBreakingNews = 0;
    case isBreakingNews = 1;
    public function translation():string
    {
        return trans('post.breaking_news.'.$this->name);
    }


}
