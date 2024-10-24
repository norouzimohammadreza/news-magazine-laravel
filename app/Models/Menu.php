<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'url',
        'parent_id',
    ];

    public function submenu()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }
}
