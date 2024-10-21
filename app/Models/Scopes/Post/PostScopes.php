<?php

namespace App\Models\Scopes\Post;

trait PostScopes
{
    protected static function booted(): void
    {
        static::addGlobalScope(new PublishedPostScope());
        static::addGlobalScope(new StatusPostScope());
    }

}
