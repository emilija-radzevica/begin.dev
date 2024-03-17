<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id', 
        'age', 
        'species', 
        'class', 
        'subclass'
    ];

    public function postInfo() {
        return $this->hasOne(Post::class, 'post_id');
    }

}
