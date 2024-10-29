<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait UserScopes
{
    public function scopeAdminUser(Builder $builder): void
    {
        $builder->where('is_admin', 1);
    }

    public function scopeNotAdminUser(Builder $builder): void
    {
        $builder->where('is_admin', 0);
    }

}
