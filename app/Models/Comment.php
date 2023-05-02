<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name',
        'email',
        'comment',
        'post_id', // add this field to the array
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}


    // rest of the code...
}
