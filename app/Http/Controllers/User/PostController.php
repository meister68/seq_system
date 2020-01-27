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
        // $validate_data = $request->validate([
        //     'title' => 'required',
        //     'description' => 'required'
        // ]);

        $test_data = array(
            'title' => 'test',
            'description' => 'test',
            'user_id' => 1,
        );
        (new CrudController('Post'))->store($test_data);
        return redirect('/home');
    }

    public function editPost($post_id)  
    {   
        $post_id = 1;
        $post = (new CrudController('Post'))->edit($post_id);
        return $post;
        
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