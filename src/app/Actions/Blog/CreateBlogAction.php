<?php

namespace App\Actions\Blog;

use App\Actions\Image\CreateMultipleResizedImagesForBlogAction;
use App\Http\Requests\StoreBlogRequest;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Str;

class CreateBlogAction
{
    public function __construct(public CreateMultipleResizedImagesForBlogAction $createMultipleResizedImagesForBlogAction)
    {
    }

    public function handle(array $data, StoreBlogRequest $request): Blog
    {
        $writer = User::findOrFail($data['user_id']);
        $slug = Str::slug($request->title, '-');
        $blog = Blog::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'category_id' => $data['category_id'],
            'writer' => $writer->name,
            'email' => $writer->email,
            'views' => 0,
            'slug' => $slug,
        ]);
        $coverName = $slug.'-cover.jpeg';
        $fullCoverPath = $request->file('cover')->storeAs('covers', $coverName, ['disk' => 'public']);
        $blog->image()->create(['path' => $fullCoverPath, 'size' => 'full']);

        $this->createMultipleResizedImagesForBlogAction->handle($blog, $fullCoverPath, $slug);

        $tags = explode(',', $data['tags']);
        foreach ($tags as $tag) {
            $blog->tags()->create(['name' => $tag]);
        }

        return $blog;
    }
}
