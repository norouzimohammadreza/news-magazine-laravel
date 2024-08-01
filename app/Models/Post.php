<?php

namespace App\Models;

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
    $this->belongsTo(User::class,'user_id');
}
public function category()
{
    $this->belongsTo(Category::class,'category_id');
}
public function comment()
{
    $this->hasMany(Comment::class);
}
}
