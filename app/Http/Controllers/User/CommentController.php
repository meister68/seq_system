<?php

namespace App\Http\Controllers\User;

use Pusher\Pusher;
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

        
        $data['message'] = 'username commented on your post';
        $pusher->trigger('test', 'App\\Events\\CommentEvent', $data);
    }

    public  function addComment(Request $request)
    {
        // $validate_data = $request->validate([
        //     'description' => 'required',
        //     'user_id' => 'required',
        //     'post_id' => 'required'
        // ]);
        $test_data = array(
            'title' => 'test',
            'description' => 'test',
            'user_id' => 1,
            'post_id' => 1
        );
        //CrudController::store('Comment',$test_data);
        return 'added successfully';
      
    }

    public function editComment($comment_id)  
    {   
        $comment = Comment::find($comment_id);
        return $comment_id;
    }

    public function update(Request $request, $comment_id)
    {
        Post::updateComment( $request->description);
        return redirect('/home');
    }

    public function removePost($comment_id)
    {
        Post::deleteComment($comment_id);
        return  redirect('/home');
    }


}