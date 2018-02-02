<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamPaper extends Model
{
    protected $table = "exam_papers";
    public $fillable = ['user_id','category_id','filename','destination_path','file_type'];
}
