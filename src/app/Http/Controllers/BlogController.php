<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Str;

class BlogController extends Controller {
    public function showAll(Request $request) {
        $blogs = Blog::with("image")->orderByDesc("id");
        $category = null;
        if (!is_null($request->query("query"))) {
            $blogs = $blogs->where("title", "LIKE", "%".$request->query("query")."%")
                            ->orWhere("writer", "LIKE", "%".$request->query("query")."%");
        }
        if (!is_null($request->query("tag"))) {
            $blogs = $blogs->whereHas("tags", function($q) use ($request) {
                return $q->where("name", $request->query("tag"));
            });
        }
        if (!is_null($request->query("category"))) {
            $category = Category::findOrFail($request->query("category"));
            $blogs = $blogs->where("category_id", $request->query("category"));
        }
    	return view("blogs", ["blogs" => $blogs->paginate(12)->withQueryString(), "category" => $category]);
    }

    public function get($slug) {
        $blog = Blog::with(["tags", "image"])->where("slug", $slug)->firstOrFail();
        $blog->update(["views" => $blog->views + 1]);
    	return view("blog", ["blog" => $blog, "content" => Markdown::parse($blog->content)]);
    }

    public function create(Request $request) {
    	$data = $request->validate([
    		"title" 		=> 	"required|unique:blogs",
    		"content" 		=> 	"required",
    		"category_id" 	=> 	"required|exists:categories,id",
    		"tags" 			=> 	"required",
    		"user_id" 		=> 	"required|exists:users,id",
    		"cover" 		=> 	"required|image"
    	]);
    	$writer = User::findOrFail($data["user_id"]);
    	$blog = Blog::create([
    		"title" 		=> 		$data["title"],
    		"content" 		=> 		$data["content"],
    		"category_id" 	=> 		$data["category_id"],
    		"writer" 		=> 		$writer->name,
    		"email" 		=> 		$writer->email,
    		"views" 		=> 		0,
            "slug"          =>      Str::slug($request->title, "-"),
    	]);
    	$path = $request->file('cover')->store('covers');
    	$blog->image()->create(["path" => $path]);
    	$tags = explode(",", $data["tags"]);
    	foreach($tags as $tag) {
    		$blog->tags()->create(["name" => $tag]);
    	}
    	return redirect()->back()->with('message', 'The blog published successfully');   
    }

    public function getAll(Request $request) {
        $blogs = new Blog;
        if (!is_null($request->query("search"))) {
            $blogs = $blogs->where("title", "LIKE", "%".$request->query("search")."%");
        }
    	return view("admin.blogs", ["blogs" => $blogs->orderByDesc("id")->paginate(15), "search" => $request->query("search")]);
    }

    public function delete(Request $request) {
        Blog::findOrFail($request->blog_id)->delete();
        return back();
    }

    public function map() {
        $blogs = Blog::orderBy("id", "desc")->get();
        return response()->view("sitemap", ["blogs" => $blogs])->header("Content-type", "text/xml");
    }
}
