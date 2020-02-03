<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'body',
        'status'
    ];
    protected $dates = ['created_at'];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
 
    public function user()
    {
        return $this->belongsTo('App\User')->select(array('id', 'name'));
    }

}
