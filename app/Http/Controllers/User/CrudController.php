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
        return $data;
    }
   

   
}
