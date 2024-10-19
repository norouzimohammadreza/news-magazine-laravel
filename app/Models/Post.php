<?php

namespace App\Models;

use App\Models\Scopes\Post\PublishedPostScope;

use App\Models\Scopes\Post\StatusPostScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'body',
        'image',
        'user_id',
        'category_id',
        'published_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
    protected static function booted():void{
        static::addGlobalScope(new PublishedPostScope());
        static::addGlobalScope(new StatusPostScope());
    }

}
