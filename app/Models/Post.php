<?php

namespace App\Models;


use App\Models\Scopes\PostScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, PostScopes, SoftDeletes;

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

    public function approvedComments()
    {
        return $this->hasMany(Comment::class)->approvedComments();
    }
}
