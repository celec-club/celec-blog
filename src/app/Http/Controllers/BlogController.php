<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Collection;
use App\Actions\Blog\CreateBlogAction;
use App\Http\Requests\StoreBlogRequest;
use App\Actions\Image\CreateMultipleResizedImagesForBlogAction;

class BlogController extends Controller
{
    public function showAll(Request $request)
    {
        $blogs = Blog::with('image', 'user')->orderByDesc('id');
        $category = null;
        if (! is_null($request->query('query'))) {
            $blogs = $blogs->where('title', 'LIKE', '%'.$request->query('query').'%')
                            ->orWhere('writer', 'LIKE', '%'.$request->query('query').'%');
        }
        if (! is_null($request->query('tag'))) {
            $blogs = $blogs->whereHas('tags', function ($q) use ($request) {
                return $q->where('name', $request->query('tag'));
            });
        }
        if (! is_null($request->query('category'))) {
            $category = Category::findOrFail($request->query('category'));
            $blogs = $blogs->where('category_id', $request->query('category'));
        }

        return view('blogs', ['blogs' => $blogs->paginate(12)->withQueryString(), 'category' => $category]);
    }

    public function get($slug)
    {
        $blog = Blog::with(['tags', 'image', 'user'])->where('slug', $slug)->firstOrFail();
        $blog->update(['views' => $blog->views + 1]);

        return view('blog', ['blog' => $blog, 'content' => Markdown::parse($blog->content)]);
    }

    public function create(StoreBlogRequest $request, CreateBlogAction $createBlogAction)
    {
        $data = $request->all();
        $createBlogAction->handle($data, $request);

        return redirect()->back()->with('message', 'The blog published successfully');
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title' => 'required|unique:blogs,title,'.$blog->id,
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);
        $slug = Str::slug($data['title']);
        $writer = User::findOrFail($data['user_id']);
        $blog->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'category_id' => $data['category_id'],
            'writer' => $writer->name,
            'email' => $writer->email,
            'slug' => $slug,
        ]);
        $blog->tags()->delete();
        $tags = explode(',', $data['tags']);
        foreach ($tags as $tag) {
            $blog->tags()->create(['name' => $tag]);
        }
        if ($request->hasFile('cover')) {
            $data = $request->validate([
                'cover' => 'required|mimes:jpg,jpeg',
            ]);
            $blog->image()->delete();
            $coverName = $slug.'-cover.jpeg';
            $fullCoverPath = $request->file('cover')->storeAs('covers', $coverName, ['disk' => 'public']);
            $blog->image()->create(['path' => $fullCoverPath, 'size' => 'full']);
            (new CreateMultipleResizedImagesForBlogAction)->handle($blog, $fullCoverPath, $slug);
        }

        return redirect()->back()->with('message', 'The blog updated successfully');
    }

    public function getAll(Request $request)
    {
        $blogs = new Blog;
        if (! is_null($request->query('search'))) {
            $blogs = $blogs->where('title', 'LIKE', '%'.$request->query('search').'%');
        }

        return view('admin.blogs', ['blogs' => $blogs->orderByDesc('id')->paginate(15), 'search' => $request->query('search')]);
    }

    public function delete(Request $request)
    {
        Blog::findOrFail($request->blog_id)->delete();

        return back();
    }

    public function map()
    {
        $blogs = Blog::orderBy('id', 'desc')->get();

        return response()->view('sitemap', ['blogs' => $blogs])->header('Content-type', 'text/xml');
    }

    public function all(): Collection
    {
        return Blog::all()->pluck('title', 'slug');
    }
}
