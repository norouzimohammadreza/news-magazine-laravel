<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=[
        'body',
        'user_id',
        'post_id'
    ];
    public function post()
    {
        $this->belongsTo(Post::class,'post_id');
    }
    public function user()
    {
        $this->belongsTo(Post::class,'user_id');
    }
}
