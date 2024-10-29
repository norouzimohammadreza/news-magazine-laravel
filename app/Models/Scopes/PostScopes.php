<?php

namespace App\Models\Scopes;

use App\Enums\PostStatusEnum;
use Illuminate\Database\Eloquent\Builder;

trait PostScopes
{
    public function scopePublished(Builder $query): void
    {
        $query->where('published_at','<',now());
    }

    public function scopeVisible(Builder $query): void
    {
        $query->where('status',PostStatusEnum::visible->value);
    }
}
