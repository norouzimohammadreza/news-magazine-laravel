<?php

namespace App\Models\Scopes\Post;

use App\Models\Scopes\Post\PublishedPostScope;

use App\Models\Scopes\Post\StatusPostScope;

trait PostScopes
{
    protected static function booted(): void
    {
        static::addGlobalScope(new PublishedPostScope());
        static::addGlobalScope(new StatusPostScope());
    }

}
