<?php

namespace App\Models\Scopes;

use App\Enums\CommentStatusEnum;
use Illuminate\Database\Eloquent\Builder;

trait CommentScopes
{
    public function scopeUnseenComments(Builder $builder): void
    {
        $builder->where('status_id', CommentStatusEnum::unseen->value);
    }

    public function scopeApprovedComments(Builder $builder): void
    {
        $builder->where('status_id', CommentStatusEnum::approved->value);
    }
}
