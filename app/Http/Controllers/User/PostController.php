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
        $validate_data = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);
        // dd($validate_data);

        (new CRUD('Post'))->store($request->all());
        return redirect('/home');
    }

    public function editPost($post_id)  
    {   
        // $post_id = 17;
        $post = (new CRUD('Post'))->edit($post_id);
        //  $post = $post;
        // dd(count($post[0]));
        // $post = json_encode($post);
        // return $post;
        //$data['post'] = $post;
        //return $data;
         return view('editPost',compact('post'));  
    }

    public function updatePost(Request $request)
    {
        
        // $data = array(
        //     'title'=> $request->title,
        //     'description'=> $request->description
        // );
        // dd($data);

        $update = (new CRUD('Post'))->update($request,$request->id);
        // dd($update);
        $update->save();
        return redirect('/home');
    }

    public function removePost($post_id)
    {
        (new CRUD('Post'))->remove($post_id);
        return  redirect('/home');
    }

    

    
}