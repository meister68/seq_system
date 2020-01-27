<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'body'
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
 
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    static function update($body, $comment_id, $post_id)
    {
     $comment = Comment::where('id', $comment_id);
     $post->title = $title;
     $post->description = $body;
     $post->save();
    }
 
    static function delete($comment_id)
    {
     $comment = Comment::find($comment_id);
     $comment->delete();
    }
}
