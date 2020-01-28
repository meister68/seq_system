<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models;
use App\Http\Controllers\Controller;

class CrudController extends Controller
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

    public function update($data, $id)
    {    
        $data =  $this->model::where('id', $id);
        if($this->model == 'Post')
        {  
            $data->title = $data['title'];
            $data->description = $data['description'];
            $data->save();
        }else{
            $data->description = $data['description'];
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
