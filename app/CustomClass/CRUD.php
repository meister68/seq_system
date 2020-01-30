<?php
namespace App\CustomClass;
use App\Models;
use App\Models\Post;
use Auth;
class CRUD
{
    public $model = 'App\\Models\\';

    public function __construct($model)
    {
        $this->model .= $model;
        //view()->share('key', $this->get());
    }

    // public function get()
    // {
    //     $test = Post::where("user_id",Auth::id())
    //     ->with(['comment' => function ($query) {
    //            $query->where('status',0);
    //     }])->get();
    //     return 1;//count($test[0]->comment);
    // }

    public  function store($data)
    {
      $this->model::create($data);
       return false;
    }

    public function edit($id)
    {
        $data = $this->model::find($id);
        return json_decode($data,true);
    }

    public function update($data, $id)
    {    
        $data =  $this->model::where('id', $id);
        if($this->model == 'Post')
        {  
            $data->title = $data['title'];
            $data->description = $data['description'];
            $data->save();
        }else{
            $data->body = $data['body'];
            $data->save();
        }
        return false;
    }

    public function remove($id)
    {
        //to be revised
        $data = $this->model::find($id);
        $data->delete();
    }

   

}


?>