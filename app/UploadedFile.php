<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\Category;

class UploadedFile extends Model
{
    protected $table = "files";
    public $fillable = ['user_id','category_id','filename','destination_path','file_type'];
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
