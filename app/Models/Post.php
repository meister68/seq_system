<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description'
    ];

    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }
 
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function  updatePost($title, $description, $post_id)
    {
     $post = Post::find($post_id);
     $post->title = $title;
     $post->description = $description;
     $post->post_id = $post_id;
     $post->save();
    }
 
    public static function deletePost($post_id)
    {
     $post = Post::find($post_id);
     $post->delete();
    }
}
