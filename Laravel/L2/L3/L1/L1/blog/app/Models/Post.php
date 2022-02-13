<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';
    protected $guarded = false;

    protected $withCount = ['likedUsers'];

//admin
    public function tags()
    {
    	return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

//users

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id', 'id');
    }

     public function likedUsers()
    {
    	return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }

     public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
