<?php

namespace App\Http\Controllers\User;

use Pusher\Pusher;
use App\CustomClass\CRUD;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;


class CommentController extends Controller
{
    public  function notify()
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
        $pusher->trigger('test', 'App\\Events\\CommentEvent', $data['message']);
    }

    public  function addComment(Request $request)
    {
        $request['status'] = 1;
        // $validate_data = $request->validate([
        //     'description' => 'required',
        //     'user_id' => 'required',
        //     'post_id' => 'required',
        //     'status' => 'required|integer'
        // ]);
        $test_data = array(
            'title' => 'test',
            'body' => 'test',
            'user_id' => 1,
            'post_id' => 1
        );
        $request['test'] = 'test';
        //dd($request->user()->id);
        (new CRUD('Comment'))->store($test_data);
        $this->notify();
        return redirect('/comment');
      
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