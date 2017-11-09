<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        //$posts = Post::all();
        //$posts = Post::paginate(2);
        $posts = Post::simplepaginate(3);
        return view('index',['posts' => $posts]);
    }
    public function show($slug){
            $post = Post::findBySlug($slug);
        return view('post.show',['post'=>$post]);
    }
    public function show1($baz){
        if (substr($baz, 0, 1).equalTo("#")){
            $baz  = substr($baz, 1);
            $post = Post::findBySlug($baz);
        }else{
            return null;
        }
        return view('post.show',['post'=>$post]);
    }
}
