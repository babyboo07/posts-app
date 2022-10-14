<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'body',
        'user_id',
    ];

    public function images()
    {
        return $this->hasMany(Images::class);
    }

    public function comment()
    {
        return $this->morphToMany(Comment::class,"comments");
    }
}
