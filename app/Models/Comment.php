<?php

namespace App\Models;

use App\Enums\CommentStatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'post_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeUnseenComments(Builder $builder): void
    {
        $builder->where('status_id', CommentStatusEnum::unseen->value);
    }

    public function scopeApprovedComments(Builder $builder): void
    {
        $builder->where('status_id', CommentStatusEnum::approved->value);
    }
}
