<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description'
    ];

    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }
 
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
