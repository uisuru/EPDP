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

    public function pdfNew(Request $request){
        $file = ExamPaper::find($request->id);
        $filename = $file->filename;
        $year = $file->year;
        $paper_or_marking = $file->paper_or_marking;
        $destination_path = json_decode($file->destination_path);
        $download_link = $_SERVER['DOCUMENT_ROOT'] . '/storage/' . $destination_path[0]->download_link;
        $path_parts = pathinfo($download_link);
        $page_directory = $path_parts['dirname'];
        $basename = $path_parts['filename'];
        $pdf = new \Spatie\PdfToImage\Pdf($download_link);
        $countOfPage = $pdf->getNumberOfPages(); //returns an int
        $path = $page_directory.'/'.$basename;
        //dd($path);
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        for ($i = 0 ; $i<$countOfPage; $i++){
            $pdf->setPage($i+1)
                ->saveImage($path);
        }
       return view('convert.newpdf', ['page_directory' => dirname('/storage/' . $destination_path[0]->download_link),'basename'=>$basename,'countOfPage'=>$countOfPage,
           'titleData'=>$filename." in ".$year."(".$paper_or_marking.")"]);
    }
}
