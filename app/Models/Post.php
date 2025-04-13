<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body'];

    // Полиморфная связь: один пост может иметь много комментариев
    // app/Models/Post.php
    public function comments()
{
    return $this->morphMany(Comment::class, 'commentable');
}
}
