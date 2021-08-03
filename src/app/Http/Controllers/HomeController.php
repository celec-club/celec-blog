<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Multiavatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller {
    public function index() {
    	$blogs = Blog::with("image")->limit(4)->latest()->get()->reverse();
    	return view("index", ["blogs" => $blogs]);
    }
}
