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
       try{
            $validate_data = $request->validate([
                'user_id' => 'required',
                'body' => 'required',
                'title' => 'required'
            ]);
            $validate_data['user_id'] = $request->user()->id;
            (new CRUD('Post'))->store($validate_data);
       }
        catch(\Exception $er){
            return redirect()->back()->withInput()->withErrors('errors','Something went wrong. Please try again later.');
        }
        return redirect('/home');
    }

    public function editPost($post_id)  
    {   
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