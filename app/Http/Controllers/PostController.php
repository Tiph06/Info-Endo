<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = \App\Models\Post::latest()->get();
        return view('blog.temoignages.temoignages', compact('posts'));
    }

    public function create()
    {
        return view('blog.temoignages.create');
    }
}
