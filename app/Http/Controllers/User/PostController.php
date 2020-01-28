<?php

namespace App\Http\Controllers\User;
use App\CustomClass\CRUD;
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
        (new CRUD('Post'))->store($test_data);
        return redirect('/home');
    }

    public function editPost($post_id)  
    {   
        $post_id = 17;
        $post = (new CRUD('Post'))->edit($post_id);
        return $post;   
    }

    public function updatePost(Request $request, $post_id)
    {
        $data = array(
            'title'=> $request->title,
            'description'=> $request->description
        );

        (new CRUD('Post'))->update($data,$post_id);
        return redirect('/home');
    }

    public function removePost($post_id)
    {
        (new CRUD('Post'))->remove($post_id);
        return  redirect('/home');
    }
}