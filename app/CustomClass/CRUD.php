<?php
namespace App\CustomClass;
use App\Models;

class CRUD
{
    public $model = 'App\\Models\\';

    public function __construct($model)
    {
        $this->model .= $model;
    }

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

    public function update($request, $id)
    {   
        $data =  $this->model::find($id);

        if($this->model == 'App\Models\Post')
        {  
            // dd($data);
            $data->title = $request->title;
            $data->description = $request->description;
            $data->save();
            // dd($data);
        }
        if($this->model == 'App\Models\Comment')
        {
            $data->body = $data['body'];
            $data->save();
        }
        return $data;
        
        // dd($data);
    }

    public function remove($id)
    {
        //to be revised
        $data = $this->model::find($id);
        $data->delete();
    }
}


?>