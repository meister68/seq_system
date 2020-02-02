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
        $data['message'] = $data['username'].'commented on your post';
        $pusher->trigger('post'.$data['post_id'], 'App\\Events\\CommentEvent', $data);
        $pusher->trigger('user'.$data['user_id'], 'App\\Events\\NotificationEvent', $data);
    }

    public  function addComment(Request $request)
    {
        $request['status'] = 0;
        $request['user_id']=Auth::id();
        $validate_data = $request->validate([
            'body' => 'required',
            'user_id' => 'required',
            'post_id' => 'required',
            'status' => 'required|integer'
        ]);

        (new CRUD('Comment'))->store($validate_data);
        $validate_data['username'] =  Auth::user()->name;
        $this->notify($validate_data);
        return redirect('/content/'.$validate_data['post_id']);
      
    }

    public function editComment($comment_id)  
    {   
        $comment = (new CRUD('Comment'))->edit($comment_id);
        return view('editComment',compact('comment'));
    }

    public function update(Request $request, $comment_id)
    {
        
        $data = array('body' => $request->body);
        (new CRUD('Comment'))->update($comment_id);
        return redirect('/home');
    }

    public function removeComment($data)
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
        $pusher->trigger('postComment'.$data['comment_id'], 'App\\Events\\DeletePostCommentEvent', $data);

        (new CRUD('Comment'))->remove($comment_id);
        return redirect('/content/'.session('post_id'));
        
    }


}