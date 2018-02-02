<?php

namespace App\Http\Controllers;

use App\Post;
use App\UploadedFile;
use Illuminate\Http\Request;
use \TCG\Voyager\Http\Controllers\VoyagerBreadController;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$posts = Post::all();
        //$posts = Post::paginate(2);
        $posts = Post::orderBy('created_at', 'desc')->simplepaginate(5);
        return view('index', ['posts' => $posts]);
    }
    public function search(Request $request)
    {
        $posts = Post::where('title', 'like', '%'.$request->search.'%')
            ->orderBy('title')
            ->paginate(20);
        return view('index', ['posts' => $posts]);
    }


    public function show($slug)
    {
        $post = Post::findBySlug($slug);
        return view('post.show', ['post' => $post]);
    }

    public function show1($baz)
    {
        if (substr($baz, 0, 1) . equalTo("#")) {
            $baz = substr($baz, 1);
            $post = Post::findBySlug($baz);
        } else {
            return null;
        }
        return view('post.show', ['post' => $post]);
    }

    public function ask()
    {
        $categories = \App\Categories::all();
        return view('questions.ask', ['categories' => $categories]);
    }

    public function askImage($id)
    {
        $file = UploadedFile::find($id);
        $categories = \App\Categories::all();
        return view('questions.askImage', ['file' => $file], ['categories' => $categories]);
    }

    public function store(Request $request, $author_id)
    {
       //dd($request);
        $this->validate($request, array(
            'title' => 'required|max:255',
            'body' => 'required|min:25',
        ));

        $question = new Post();
        $question->author_id = $author_id;
        $question->category_id = $request->category_id;
        $question->title = $request->title;
        $question->excerpt = $request->excerpt;
        $question->body = $request->body;
        $question->bodyImage = $request->bodyImage;
        $question->slug = self::createSlug($request->title);
        $question->status = "PUBLISHED";

        //dd($question);
        $question->save();
        return redirect()->to('/');
    }

    public function deleteFile($id)
    {
        $file = UploadedFile::find($id);
        Storage::delete(config('app.fileDestinationPath') . '/' . Auth::user()->email . '/' . $file->filename);
        //UploadedFile::destroy($id);
        $file->delete();
        return redirect()->to('/upload');
    }

    public static function createSlug($str, $delimiter = '-')
    {
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        $slug = $slug.str_random(25);
        return $slug;
    }
}
