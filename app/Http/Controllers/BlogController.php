<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts=Article::all();
        return view('blog',compact('posts'));
    }
}
