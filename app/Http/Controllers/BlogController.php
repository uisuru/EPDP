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
}
