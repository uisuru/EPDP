<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadedFile extends Model
{
    protected $table = "files";
    public $fillable = ['user_id','filename','destination_path','file_type'];
}
