<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $table = 'categories';
    public function uploadedFile()
    {
        return $this->hasMany('App\UploadedFile');
    }
}
