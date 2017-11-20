<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class pageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($slug)
    {
        $page = Page::findBySlug($slug);
        return view('page.show',['page'=>$page]);
    }
}
