<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'verify_token',
        'forgot_token'
    ];
    public function post()
    {
        return  $this->hasMany(Post::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
