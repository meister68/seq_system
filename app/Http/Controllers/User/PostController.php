<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function addPost(Request $request)
    {
        $validate_data = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        Post::create($request->all());
        return redirect('/home');
        // return 'create post page';
    }

    public function editPost($post_id)  
    {   
        $post = Post::find($post_id);
        //return redirect('/home');
        return $post_id;
    }

    public function update(Request $request, $post_id)
    {
        Post::updatePost($request->title, $request->description, $post_id);
        return redirect('/home');
    }

    public function removePost($post_id)
    {
        Post::deletePost($post_id);
        return  redirect('/home');
    }

    
}