<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function commentsWithUser()
{
    return $this->comments()->with('user')->latest()->get();
}

}
