<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Post;

class PostController extends Controller
{
    //
    public function addPost(Request $request)
    {
        // $validate_data = $request->validate([
        //     'title' => 'required',
        //     'description' => 'required'
        // ]);

        // Post::create($request->all());
        return redirect('/home');
    }

    public function editPost($post_id)  
    {   
        $post = Post::find($post_id);
        //return view('contacts.editContact',['contact'=>$contact]);
    }

    public function updatePost(Request $request, $post_id)
    {
        Post::updatePost($request->title, $request->description, $post_id);
        return redirect('/home');
    }

    public function removePost($post_id)
    {
        Post::delete($post_id);
        return  redirect('/home');
    }
}