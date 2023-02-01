<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    protected $guarded = [];

    // ONE TO MANY: morph many

    public function comments() 
    {
        return $this->morphMany(Comment::class, "commentable");
        
    }

    public function comment() 
    {
        return $this->morphOne(Comment::class, 'commentable');
    }


    public function tags() 
    {
        return $this->morphToMany(Tag::class, 'taggable','taggables');

    }

    use HasFactory;
}
