<?php

namespace App\Http\Controllers;

use App\UploadedFile;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Facades\Auth;

class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function handleUpload(Request $request)
    {
        //dd($request->all());
        //if($request->hasFile('file')){
        $file = $request->file('file');
        $allowedFileType = 'pdf,jpg,png,jpeg';
        $maxFileSize = 10000;//1MB = 1000
        $rules = [
            'file' => 'required|mimes:' . $allowedFileType . '|max:' . $maxFileSize
        ];
        $this->validate($request, $rules);
        $filename = $file->getClientOriginalName();
        $file_type = $file->clientExtension();
        $user_id = Auth::user()->id;
        $destinationPath = config('app.fileDestinationPath') . '/' . Auth::user()->email . '/' . $filename;
        $destinationPathLocal = 'storage/uploads' . '/' . Auth::user()->email . '/' . $filename;
        $uploaded = Storage::put($destinationPath, file_get_contents($file->getRealPath()));

        if ($uploaded) {
            UploadedFile::create([
                'user_id' => $user_id,
                'filename' => $filename,
                'destination_path'=>$destinationPathLocal,
                'file_type' => $file_type
            ]);
        }
        // }
        return redirect()->to('/upload');
    }

    public function upload()
    {
        //$directory = config('app.fileDestinationPath').'/'.Auth::user()->email;
        //$files = Storage::files($directory);
        //$folders = Storage::directories($directory);//frome directory
        $files = UploadedFile::all();
        $filesMyPdf = UploadedFile::where('user_id', Auth::user()->id)->where('file_type', 'pdf')->get();
        $fileMyImage = UploadedFile::where('user_id', Auth::user()->id)
            ->where(function ($q) {
                $q->where('file_type', 'jpg')
                    ->orwhere('file_type', 'jpeg')
                    ->orwhere('file_type', 'png');
            })->get();
        return view('files.upload')->with(array('files' => $files, 'fileMyImage' => $fileMyImage, 'filesMyPdf' => $filesMyPdf));
    }

    public function deleteFile($id)
    {
        $file = UploadedFile::find($id);
        Storage::delete(config('app.fileDestinationPath') . '/' . Auth::user()->email . '/' . $file->filename);
        //UploadedFile::destroy($id);
        $file->delete();
        return redirect()->to('/upload');
    }
}
