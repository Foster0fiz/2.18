<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Comment.php
class Comment extends Model
{
    protected $fillable = [
        'user_name', 
        'content',
        'commentable_id', 
        'commentable_type'
    ];

    // Убедитесь в правильности связи
    public function commentable()
    {
        return $this->morphTo();
    }
}