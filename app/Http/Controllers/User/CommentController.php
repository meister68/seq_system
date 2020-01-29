<?php

namespace App\Http\Controllers\User;

use Pusher\Pusher;
use App\CustomClass\CRUD;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Auth;


class CommentController extends Controller
{
    public  function notify($data)
    {
        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        
        );      

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'), 
            $options
        );

        // $test_data = array(
        //     'title' => 'test',
        //     'body' => 'test',
        //     'user_id' => 1,
        //     'post_id' => 1
        // );
        $data['message'] = 'username commented on your post';
        $pusher->trigger('test', 'App\\Events\\CommentEvent', $data);
    }

    public  function addComment(Request $request)
    {
        $request['status'] = 1;
        $request['user_id']=Auth::id();
        // dd($request->all());
        $validate_data = $request->validate([
            'body' => 'required',
            'user_id' => 'required',
            'post_id' => 'required',
            'status' => 'required|integer'
        ]);
        // $test_data = array(
        //     'body' => '',
        //     'user_id' => 1,
        //     'post_id' => 1,
        //     'status' => 0
        // );
        // dd($validate_data);
        (new CRUD('Comment'))->store($validate_data);
        $this->notify($validate_data);
        return redirect('/content/'.$validate_data['post_id']);
      
    }

    public function editComment($comment_id)  
    {   
        (new CRUD('Comment'))->edit($comment_id);
        return $comment_id;
    }

    public function update(Request $request, $comment_id)
    {
        
        $data = array('body' => $request->body);
        (new CRUD('Comment'))->update($comment_id);
        return redirect('/home');
    }

    public function removePost($comment_id)
    {
        (new CRUD('Comment'))->remove($comment_id);
        return  redirect('/home');
    }


}