<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Scalar\MagicConst\Method;

class Post extends Model
{

    protected $fillable = ['user_id','title'];
    public function user(){
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest User'
        ]);

    }

    //Morphmany - one to many
    public function comments() 
    {
        return $this->morphMany(Comment::class, "commentable");
        
    }
    public function comment() 
    {
        return $this->morphOne(Comment::class, 'commentable')->latest();
    }


    public function tags() 
    {
        return $this->morphToMany(Tag::class, 'taggable');

    }
















    use HasFactory;
}
