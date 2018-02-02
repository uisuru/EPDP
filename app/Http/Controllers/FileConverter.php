<?php

namespace App\Http\Controllers;

use App\ExamPaper;
use App\UploadedFile;
use Illuminate\Http\Request;

class FileConverter extends Controller
{
    public function crop(){
        return view('convert.crop');
    }
    public function cropImage($id)
    {
        $file = UploadedFile::find($id);
        $categories = \App\Categories::all();
        return view('convert.cropImage', ['file' => $file]);
    }
    public function pdf(Request $request){
        $file = ExamPaper::find($request->id);
        foreach (json_decode($file->destination_path) as $file){
            //dd($file->download_link);
            return view('convert.pdf', ['file' => $file]);
        }
    }
}
