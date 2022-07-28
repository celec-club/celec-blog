<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('image')->limit(4)->latest()->get()->reverse();

        return view('index', ['blogs' => $blogs]);
    }
}
