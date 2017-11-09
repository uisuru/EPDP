<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Upload extends Controller
{
    public function show(){
        return view('upload.uploadpdf');
    }
}
