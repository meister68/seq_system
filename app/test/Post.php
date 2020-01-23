<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   static function update($title, $description, $post_id)
   {
    $post = Post::find($post_id);
    $post->title = $title;
    $post->description = $description;
    $post->post_id = $post_id;
    $post->save();
   }

   static function delete($post_id)
   {
    $post = Post::find($post_id);
    $post->delete();
   }
}
