<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Imagick;

class dropzoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Generate Image upload View
     *
     * @return void
     */
    public function dropzone()
    {
        //return view('upload.dropzone-view');
        return view('upload.uploadD');
    }

    /**
     * Image Upload Code
     *
     * @return void
     */

    public function test1(Request $request)
    {
        //$file = $_FILES['croppedImage'];
        $destinationPath = config('app.fileDestinationPath') . '/isurutest/aa.jpg';
        $filename = $request->filename;
        //$filename = $_POST['filename'];
        //$img = $_POST['pngimageData'];
        $img =  $request->pngimageData;
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $uploaded = Storage::put($destinationPath, $request->file()->getRealPath());
    }
    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images').'/'.Auth::user()->email ,$imageName);
        return response()->json(['success'=>$imageName]);
    }
    public function test(Request $request)
    {

        $pdfAbsolutePath = __DIR__."/test.pdf";

        if (move_uploaded_file($_FILES['templateDoc']["tmp_name"], $pdfAbsolutePath)) {

            $im             = new \Imagick($pdfAbsolutePath);

            $noOfPagesInPDF = $im->getNumberImages();

            if ($noOfPagesInPDF) {

                for ($i = 0; $i < $noOfPagesInPDF; $i++) {

                    $url = $pdfAbsolutePath.'['.$i.']';

                    $image = new \Imagick($url);

                    $image->setImageFormat("jpg");

                    $image->writeImage(__DIR__."/".($i+1).'-'.rand().'.jpg');

                }

                return "All pages of PDF is converted to images";

            }
            return "PDF doesn't have any pages";

        }
        return "fuck";

    }
}
