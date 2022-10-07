<?php

namespace App\Actions\Image;

use App\Models\Blog;
use Spatie\Image\Image;

class CreateMultipleResizedImagesForBlogAction
{
    public function handle(Blog $blog, string $fullCoverPath, string $slug): void
    {
        $smallCoverPath = 'covers/'.$slug.'-360x250-cover.jpeg';
        Image::load(storage_path().'/app/public/'.$fullCoverPath)->width(360)->height(250)->save('storage/app/public/'.$smallCoverPath);
        $mediumCoverPath = 'covers/'.$slug.'-600x400-cover.jpeg';
        Image::load(storage_path().'/app/public/'.$fullCoverPath)->width(600)->height(400)->save('storage/app/public/'.$mediumCoverPath);
        $blog->image()->create(['path' => $smallCoverPath, 'size' => 'small']);
        $blog->image()->create(['path' => $mediumCoverPath, 'size' => 'medium']);
    }
}
