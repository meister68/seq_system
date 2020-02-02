<?php
namespace App\CustomClass;
use App\Models\Post;

class Query{

    public function __construct()
    {
        
    }

    public function getUnreadComment($user_id)
    {
        $result = Post::where("user_id",$user_id)->with(['comment' => function ($query) {$query->where('status',0);}])->get();
        return $result;
    }

}


?>