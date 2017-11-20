<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('upload.dropzone-view');
    }

    /**
     * Image Upload Code
     *
     * @return void
     */
    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images').'/'.Auth::user()->email ,$imageName);
        return response()->json(['success'=>$imageName]);
    }
}
