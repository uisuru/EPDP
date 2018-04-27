<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function post(){
        return $this->belongsTo('App\Post');
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
